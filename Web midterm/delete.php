<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
$id = $_POST["id"];
if(isset($_POST["delete"])){
    if($repository->deleteJob($id)){
        $_SESSION["message4"] = "Deletion successful";
        header("Location: profile.php");
        die();
    }else{
        $_SESSION["error4"] = "Could not delete";
        header("Location: profile.php");
        die();
    }
}else{
    $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
    if($repository->updateJob($id, $title, $category, $description)){
        $_SESSION["message4"] = "Update successful";
        header("Location: profile.php");
        die();
    }else{
        $_SESSION["error4"] = "Could not update";
        header("Location: profile.php");
        die();;
    }
}