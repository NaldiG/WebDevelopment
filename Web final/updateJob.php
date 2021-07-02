<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$id = $_POST["id"];
$data = array();
$title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
if($repository->updateJob($id, $title, $category, $description)){
    $data['message4'] = "Update successful";

    $data['button'] = "action " . $_POST['action'];

    $json = json_encode($data);
    echo $json;
    die();
}else{
    $data['error4'] = "Could not update";
    $json = json_encode($data);
    echo $json;
    die();;
}
