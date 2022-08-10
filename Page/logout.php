<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (!Login::isLoggedIn()) {
        die(header('Location:../index.php'));
}

if (isset($_POST['confirm'])) {

        if (isset($_POST['alldevices'])) {

                DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid' => Login::isLoggedIn()));
        } else {
                if (isset($_COOKIE['SNID'])) {
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token' => sha1($_COOKIE['SNID'])));
                }
                setcookie('SNID', '1', time() - 3600);
                setcookie('SNID_', '1', time() - 3600);
        }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/img/logout.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/index.css">
        <title>Logout</title>
</head>

<body>
        <div class="login-box">

                
                <h1>Are you sure you'd like to logout? </h1>
                <p>Double click Confirm Button</p>
                <form method="POST">
                        <button class="button" role="button" name="confirm"> Confirm</button>
                        <a href="../index.php">Back
                        </a>
                </form>
        </div>

</body>

</html>