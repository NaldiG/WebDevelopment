<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once "connection.php";

$task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);

$db->exec("INSERT INTO tasks (title, user_id) VALUES ('$task', $user_id)");

header("Location: tasks.php");
