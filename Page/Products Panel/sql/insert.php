<?php

session_start();
require('config.php');
if (isset($_POST['action'])) {
	$name =  $_POST['name'];
	$count = $_POST['counts'];
	$price = $_POST['price'];
	$supplier = $_POST['supplier'];
	


	switch ($supplier) {
		
		case 'econt':
			$todayDate = date("Y-m-d"); // current date

			//Add one day to today
			$date = strtotime(date("Y-m-d", strtotime($todayDate)) . " +4 day");
			$time =date('l dS \o\f F Y', $date);
			break;
		case 'speedy':
			$todayDate = date("Y-m-d"); // current date

			//Add one day to today
			$date = strtotime(date("Y-m-d", strtotime($todayDate)) . " +3 day");
			$time =date('l dS \o\f F Y', $date);
			break;

		default:

			$todayDate = date("Y-m-d"); // current date
			//Add one day to today
			$date = strtotime(date("Y-m-d", strtotime($todayDate)) . " +8 day");
			$time =date('l dS \o\f F Y', $date);
			break;
	}

	$sql = "INSERT INTO products (ptname,count,price,supplier,date)
	 VALUES ('$name','$count','$price','$supplier','$time')";
	if (mysqli_query($con, $sql)) {
		header("Location: ../Pages/products/products.php");
	} else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	}
	mysqli_close($con);
}
