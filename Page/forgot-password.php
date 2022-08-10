<?php
include('./classes/DB.php');

if (isset($_POST['resetpassword'])) {

        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $email = $_POST['email'];
        $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email' => $email))[0]['id'];
     if($user_id > 0 ){
        DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token' => sha1($token), ':user_id' => $user_id));
        header("Location:./change-password.php?token={$token}");}else{
        header("Location:./forgot-password.php");}
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
                        <title>Forgot-Password</title>
                </head>

                <body>
                        <div class="login-box">
                                <h1>Login</h1>
                                <form method="POST">
                                        <div class="user-box">
                                                <input type="email" name="email"  placeholder="Email ..." required>
                                        </div>
                                        <button class="button" role="button" name="resetpassword"> Login</button>
                                </form>
                        </div>
                </body>

                </html>