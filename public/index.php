<?php

require __DIR__ . "/../vendor/autoload.php";
const BASE_PATH = __DIR__ . "/../app/";

$config = require(BASE_PATH . "config/config.php");

use App\Database;

$db = new Database(
    $config["database"],
    $config["username"], 
    $config["password"]
);

require(BASE_PATH . "core/functions.php");
require(BASE_PATH . "router.php");
