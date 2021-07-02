<?php
require_once "database.php";
require_once "repository.php";
session_start();
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$data = array();
if(!isset($_FILES['image'])) {
    $data['error1'] = "No image was submitted";
    $json = json_encode($data);
    echo $json;
    die();
}
$image_data = getimagesize($_FILES['image']['tmp_name']);
if($image_data == false) {
    $data['error1'] = "The file was not an image file";
    $json = json_encode($data);
    echo $json;
    die();
}
if($_FILES['image']['size'] > 20000) {
    $data['error1'] = "The file is too big";
    $json = json_encode($data);
    echo $json;
    die();
}

$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$valid_extensions = array('jpg', 'jpeg', 'png', 'jfif');

if(!in_array($extension, $valid_extensions)) {
    $data['error1'] = "Invalid type";
    $json = json_encode($data);
    echo $json;
    die();
}

$filename = md5($_FILES['image']['name'] . $_FILES['image']['tmp_name'] . $extension);
$logo = $_POST["logo"];
$id = $_POST["id"];
if($repository->uploadLogo($filename . '.' . $extension, $id) && move_uploaded_file($_FILES['image']['tmp_name'], 'Logo/' . $filename . '.' . $extension)) {
    unlink('Logo/' . $logo);
    $data['message1'] = "File successfully uploaded";
    $json = json_encode($data);
    echo $json;
    die();
}
else {
    $data['error1'] = "Could not upload file";
    $json = json_encode($data);
    echo $json;
    die();;
}

