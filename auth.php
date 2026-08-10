<?php

require('Database.php');
$config = require('config.php');

$db = new Database(
    $config['database'],
    $config['username'],
    $config['password']
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
}