<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
if(isset($_GET["start"])){
    $result = $repository->getAllJobs();
    $_SESSION["filter"] = $result;
    header("Location: home.php");
    die();
}
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
$_SESSION["city"] = $city;
$_SESSION["category"] = $category;
if(empty($city) && empty($category)){
    echo("all");
    $result = $repository->getAllJobs();
    $_SESSION["filter"] = $result;
}elseif (empty($category)){
    echo("city");
    $result = $repository->findByCity($city);
    $_SESSION["filter"] = $result;
}elseif (empty($city)){
    echo("category");
    $result = $repository->findByCategory($category);
    $_SESSION["filter"] = $result;
}else{
    echo("category and city");
    $result = $repository->findByCityAndCategory($city, $category);
    $_SESSION["filter"] = $result;
}
header("Location: home.php");