<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
if(!isset($_FILES['image'])) {
    $_SESSION["error1"] = "No image was submitted";
    header("Location: profile.php");
    die();
}
$image_data = getimagesize($_FILES['image']['tmp_name']);
if($image_data == false) {
    $_SESSION["error1"] = "The file was not an image file";
    header("Location: profile.php");
    die();
}
if($_FILES['image']['size'] > 20000) {
    $_SESSION["error1"] = "The file is too big";
    header("Location: profile.php");
    die();
}

$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$valid_extensions = array('jpg', 'jpeg', 'png', 'jfif');

if(!in_array($extension, $valid_extensions)) {
    $_SESSION["error1"] = "Invalid type";
    header("Location: profile.php");
    die();
}

$filename = md5($_FILES['image']['name'] . $_FILES['image']['tmp_name'] . $extension);
$logo = $_POST["logo"];
$id = $_SESSION["id"];
if($repository->uploadLogo($filename . '.' . $extension, $id) && move_uploaded_file($_FILES['image']['tmp_name'], 'Logo/' . $filename . '.' . $extension)) {
    unlink('Logo/' . $logo);
    $_SESSION["message1"] = "File successfully uploaded";
    header("Location: profile.php");
    die();
}
else {
    $_SESSION["error1"] = "Could not upload file";
    header("Location: profile.php");
    die();;
}

