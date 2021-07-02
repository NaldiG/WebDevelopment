<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
$id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
$data = array();
if($repository->createJob($id, $title, $category, $description)){
    $data['message3'] = "Job created";
    $json = json_encode($data);
    echo $json;
    die();
}else{
    $data['error3'] = "Could not create job";
    $json = json_encode($data);
    echo $json;
    die();
}