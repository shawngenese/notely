<?php

require('Database.php');
$config = require('config.php');

$db = new Database(
    $config['database'],
    $config['username'],
    $config['password']
);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = trim($_POST['name']);
    $username = $_POST['username'];
    $password = $_POST['password'];


    // hardcoded pa
    // change this block of code kapag okay na

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        // $errors['email'] = "username is not valid";
        echo "email is not valid";
        return;
    }

    echo "Register success";

    $result = $db->query("SELECT email FROM users WHERE email = :username", [
        ':username' => $username
    ])->fetch();

    if ($result) {
        echo "<pre>";
        echo "email is already taken" . "<br>";
        print_r($result);
        echo "</pre>";
    }
     else {
        echo "you are now registered";
        header("location: /login");
     }
    
    
}