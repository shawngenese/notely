<?php

$request = $_SERVER["REQUEST_URI"];
$ctrlDir = "controllers/";

switch ($request) {
    case "/":
        require(BASE_PATH . $ctrlDir ."login.php");
        break;
    case "/login":
        require(BASE_PATH . $ctrlDir ."login.php");
        break;
    case "/register":
        require(BASE_PATH . $ctrlDir . "register.php");
        break;
    case "/about":
        require(BASE_PATH . $ctrlDir . "about.php");
        break;
    case "/notes":
        echo "Welcome to notes";
        break;
    default:
        // require(BASE_PATH . $ctrlDir. "404.php");
        echo "404 not found";
        break;
}