<?php
session_start();
$username = "";
$email = "";
if(isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $username = $error['username'];
    $email = $error['email'];
    $error_message = $error['message'];
    unset($_SESSION['error']);

    echo "<div style='color:red'>$error_message</div>";
}

?>


<form method="post" action="authenticate_register.php">
    <input type="text" name="username" placeholder="Username" value="<?=$username;?>"><br>
    <input type="text" name="email" placeholder="email" value="<?=$email;?>"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="re_password" placeholder="Re-enter password"><br>
    <input type="submit" value="Register">
</form>
<a href='login.php'>Login</a>