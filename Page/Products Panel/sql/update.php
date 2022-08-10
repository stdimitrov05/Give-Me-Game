<?php


include_once 'config.php';
session_start();

$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (count($_POST) > 0) {
    $id = $_POST['id'];
    

	$name =  $_POST['name'];
	$count = $_POST['count'];
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

    $sql = "UPDATE products set id='$id', ptname='$name',  count='$count' ,price='$price',supplier='$supplier' ,date= '$time' WHERE id='$id'";
    mysqli_query($con, $sql);
    header('Location:../Pages/products/products.php');
}

?>
<html>

<head>
    <title>Update <?php echo $row['date']?> Data</title>
</head>

<body>
    <form name="frmUser" method="post" action="">
        
        <div style="padding-bottom:5px;">
            <a href="../Pages/products/products.php">Back to Table</a>
        </div>
        Produc ID: <br>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $row["id"]; ?>">
        <br>
       Products Name<br>
        <input type="text" name="name" class="txtField" value="<?php echo $row["ptname"]; ?>">
        <br>
        Counts:<br>
        <input type="text" name="count" class="txtField" value="<?php echo $row['count']; ?>">
        <br>
        Price:<br>
        <input type="text" name="price" class="txtField" value="<?php echo $row['price']; ?>">
        <br>
        Supplier:<br>
        <input type="text" name="supplier" class="txtField" value="<?php echo $row['supplier']; ?>">
        <input type="submit" name="submit" value="Update">

    </form>
</body>

</html>