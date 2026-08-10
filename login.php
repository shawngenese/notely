<?php

//
session_start();
//


require('Database.php');
$config = require('config.php');

$db = new Database(
    $config['database'],
    $config['username'],
    $config['password']
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $db->query("SELECT name, email, password FROM users WHERE email = :username", [
        ':username' => $username
    ])->fetch();
    
    $dbPassword = $result['password'];
     
    if (! $result || !password_verify($password, $dbPassword)) {
        echo "login error";
    } else {
        echo "login success";

        $name = $result['name'];
        $username = $result['email'];

        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        header('Location: notes.php');
        exit();
    }

}
