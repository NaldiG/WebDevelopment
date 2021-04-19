<?php
session_start();
require_once "connection.php";
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$result = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $row['id'];
    header("Location: tasks.php");
}
else {
    $error = [
        'message' => 'Username or password is wrong',
        'username' => $username,
    ];
    $_SESSION['error'] = $error;
    header("Location: login.php");
}

