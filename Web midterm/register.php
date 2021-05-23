<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$ok = $repository->createCompany($name, $city, $username, $password);
if(!$ok){
    $_SESSION["error"] = "Something went wrong";
    header("Location: signup.php");
}else{
    $_SESSION["confirm"] = "Sing up successful, please sing in.";
    header("Location: signin.php");
}