<?php
session_start();
require_once "connection.php";
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$re_password = filter_var($_POST['re_password'], FILTER_SANITIZE_STRING);

if($password != $re_password){
    $error = [
        'message' => 'Password is not re-entered correctly',
        'username' => $username,
        'email' => $email,
    ];
    $_SESSION['error'] = $error;
    header("Location: register.php");
    die();
}

$result = $db->query("SELECT * FROM users WHERE username='$username' or email='$email'");
if($result->rowCount() > 0) {
    $error = [
        'message' => 'Username or email already exists',
        'username' => $username,
        'email' => $email,
    ];
    $_SESSION['error'] = $error;
    header("Location: register.php");
    die();
}

$db->exec("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
header("Location: login.php");