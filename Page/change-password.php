<?php
include('./classes/DB.php');
include('./classes/Login.php');
$tokenIsValid = False;
if (Login::isLoggedIn()) {

        if (isset($_POST['changepassword'])) {

                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                $userid = Login::isLoggedIn();

                if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {

                        if ($newpassword == $newpasswordrepeat) {

                                if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                        DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                        echo 'Password changed successfully!';
                                        header('Location:../index.php');
                                }

                        } else {
                                echo 'Passwords don\'t match!';
                        }

                } else {
                        echo 'Incorrect old password!';
                }

        }

} else {
        if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))) {
                $userid = DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                $tokenIsValid = True;
                if (isset($_POST['changepassword'])) {

                        $newpassword = $_POST['newpassword'];
                        $newpasswordrepeat = $_POST['newpasswordrepeat'];

                                if ($newpassword == $newpasswordrepeat) {

                                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                                DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                                echo 'Password changed successfully!';
                                                header('Location:../index.php');
                                                DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                        }

                                } else {
                                        echo 'Passwords don\'t match!';
                                }

                        }


        } else {
                die('Token invalid');
                header('Location:../login.php');
        }
} else {
        die('Not logged in');
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/img/password.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/index.css">
        <title>Change your Password</title>
</head>
<body>
<div class="login-box">
                <h1>Change your Password</h1>
                <form method="POST" action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else { echo 'change-password.php?token='.$token.''; } ?>" method="post">
        <?php if (!$tokenIsValid) { echo ' <div class="user-box"><input type="password" name="oldpassword" value="" placeholder="Current Password ..."></div>'; } ?>


                        <div class="user-box">
                        <input type="password" name="newpassword" value="" placeholder="New Password ..." required>
                        </div>
                        <div class="user-box">

                        <input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password ..." required>
                        </div>
                       
                        <button class="button" role="button" name="changepassword"> Change Password</button>
                     


                </form>
        </div>
</body>
</html>


