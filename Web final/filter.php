<?php
require_once "database.php";
require_once "repository.php";
session_start();
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
if(isset($_GET["start"])){
    $result = $repository->getAllJobs();
    $json = json_encode($result);
    echo $json;
    die();
}
if(isset($_GET["id"])){
    $id = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
    $job = $repository->getJob($id);
    $json = json_encode($job);
    echo $json;
    die();
}
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
if(empty($city) && empty($category)){
    $result = $repository->getAllJobs();
    $json = json_encode($result);
    echo $json;
}elseif (empty($category)){
    $result = $repository->findByCity($city);
    $json = json_encode($result);
    echo $json;
}elseif (empty($city)){
    $result = $repository->findByCategory($category);
    $json = json_encode($result);
    echo $json;
}else{
    $result = $repository->findByCityAndCategory($city, $category);
    $json = json_encode($result);
    echo $json;
}
