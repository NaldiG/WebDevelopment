<?php
require_once "database.php";
require_once "repository.php";
session_start();
$repository = new Repository($pdo);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$id = $repository->findCompany($username, $password);
if(is_null($id)){
    $_SESSION["error"] = array(
        "message" => "Username or password is incorrect",
        "username" => $username,
    );
    header("Location: signin.php");
}else{
    $_SESSION["id"] = $id;
    header("Location: profile.php");
}

