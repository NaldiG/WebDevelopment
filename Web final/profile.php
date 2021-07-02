<?php
require_once "database.php";
require_once "repository.php";
header("Content-type:application/json;charset=utf-8");
$repository = new Repository($pdo);
$id = $_GET['id'];
$jobs = $repository->findJobsByCompany($id);
$company = $repository->getCompany($id);
$data = array();
$data['jobs'] = $jobs;
$data['company'] = $company;
$json = json_encode($data);
echo $json;

