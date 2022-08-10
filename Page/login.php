<?php
include('classes/DB.php');

if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username' => $username))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username' => $username))[0]['password'])) {

                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username' => $username))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token' => sha1($token), ':user_id' => $user_id));
                        if ($username == "admin" && $user_id == '0') {
                                header('Location: ../Page/Products Panel/dashboard.php');
                            } else {
                                header('Location: ../index.php');
                            }
                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                } else {
                        echo 'Incorrect Password!';
                }
        } else {
                echo 'User not registered!';
                header('Location: ./create-account.php');
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
        <link rel="icon" type="image/x-icon" href="../assets/img/user.png" />
        <title>GMG Login</title>
</head>

<body>
        <div class="login-box">
                <h1>Login</h1>
                <form method="POST">


                        <div class="user-box">
                                <input type="text" name="username" class="form-control" placeholder="Please enter your username" id="username">
                        </div>
                        <div class="user-box">

                                <input type="password" name="password" class="form-control" placeholder="Please enter your password" id="password" required>
                        </div>

                        <button class="button" role="button" name="login"> Login</button>
                        <a href="../Page/forgot-password.php">
                                Forgot password?
                        </a>


                </form>
        </div>


</body>

</html>