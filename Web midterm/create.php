<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
$title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
$id = $_SESSION["id"];
if($repository->createJob($id, $title, $category, $description)){
    $_SESSION["message3"] = "Job created";
    header("Location: profile.php");
    die();
}else{
    $_SESSION["error3"] = "Could not create job";
    header("Location: profile.php");
    die();
}