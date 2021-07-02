<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$info = filter_var($_POST["info"], FILTER_SANITIZE_STRING);
$id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
$data = array();
if($repository->updateCompany($id, $name, $city, $info)){
    $data['message2'] = "Update successful";
    $json = json_encode($data);
    echo $json;
    die();
}else{
    $data['error2'] = "Could not update";
    $json = json_encode($data);
    echo $json;
    die();
}