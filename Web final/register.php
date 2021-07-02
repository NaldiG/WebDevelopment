<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$ok = $repository->createCompany($name, $city, $username, $password);
if(!$ok){
    $data = array();
    $data['error'] = "Something went wrong";
    $json = json_encode($data);
    echo $json;
}else{
    $data = array();
    $data['confirm'] = "Sing up successful, please sing in.";
    $json = json_encode($data);
    echo $json;
}