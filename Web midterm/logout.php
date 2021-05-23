<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["filter"]);
header("Location: home.php");