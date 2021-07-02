<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$id = $_GET["id"];
$data = array();
if($repository->deleteJob($id)){
    $data['message4'] = "Deletion successful";
    $json = json_encode($data);
    echo $json;
    die();
}else{
    $data['error4'] = "Could not delete";
    $json = json_encode($data);
    echo $json;
    die();
}
