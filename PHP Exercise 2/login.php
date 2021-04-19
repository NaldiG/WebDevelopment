<?php
session_start();
$username = "";
if(isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $username = $error['username'];
    $error_message = $error['message'];
    unset($_SESSION['error']);

    echo "<div style='color:red'>$error_message</div>";
}

?>


<form method="post" action="authenticate.php">
    <input type="text" name="username" placeholder="Username" value="<?=$username;?>">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>
<a href='register.php'>Register</a>
