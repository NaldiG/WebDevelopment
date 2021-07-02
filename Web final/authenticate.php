<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$id = $repository->findCompany($username, $password);
if(is_null($id)){
    $data = array();
    $data['error'] = "Username or password is incorrect";
    $json = json_encode($data);
    echo $json;
}else{
    $data = array();
    $data['id'] = $id;
    $json = json_encode($data);
    echo $json;
}

