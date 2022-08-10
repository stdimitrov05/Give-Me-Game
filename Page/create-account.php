<?php
include('classes/DB.php');

if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                        DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                        echo "Success!";
                                        header('Location:../index.php');
                                } else {
                                        echo 'Email in use!';
                                }
                        } else {
                                        echo 'Invalid email!';
                                }
                        } else {
                                echo 'Invalid password!';
                        }
                        } else {
                                echo 'Invalid username';
                        }
                } else {
                        echo 'Invalid username';
                }

        } else {
                echo 'User already exists!';
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/index.css">
        <title>Register</title>
</head>
<body>
        
<div class="login-box">
                <h1>Register</h1>
                <form method="POST">


                        <div class="user-box">
                        <input type="text" name="username" value="" placeholder="Username ...">
                        </div>
                        <div class="user-box">

                        <input type="password" name="password" value="" placeholder="Password ...">
                        </div>

                        <div class="user-box">

                        <input type="email" name="email" value="" placeholder="someone@somesite.com">
                        </div>
                        <button class="button" role="button" name="createaccount"> Register</button>
                        <a href="./login.php">
                                You  have an account?
                        </a>


                </form>
        </div>
</body>
</html>