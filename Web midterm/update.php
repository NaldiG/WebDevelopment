<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$info = filter_var($_POST["info"], FILTER_SANITIZE_STRING);
$id = $_SESSION["id"];
if($repository->updateCompany($id, $name, $city, $info)){
    $_SESSION["message2"] = "Update successful";
    header("Location: profile.php");
    die();
}else{
    $_SESSION["error2"] = "Could not update";
    header("Location: profile.php");
    die();
}