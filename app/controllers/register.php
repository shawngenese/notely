<?php

/**
 * @var array $config
 */

use App\Database;
use App\Validator;

$validator = new Validator();

$db = new Database(
    $config["database"],
    $config["username"], 
    $config["password"]
);

$registerError = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["SIGN_UP"])) {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $validator->required("name", $name)
              ->required("email", $username)
              ->email("email", $username)
              ->required("password", $password)
              ->min("password", $password, 6)
              ->max("password", $password, 25);

    $registerError = $validator->errors();

    if (! $validator->passes()) {
        view("signUp.view.php", [
            "registerError" => $registerError
        ]);
        exit();
    }

    $query = $db->query("SELECT email FROM users WHERE email = :username", [
        ":username" => $username
    ]);

    $isExisting = $query->fetch();

    if($isExisting){
        $registerError["registerError"] = "Email is aready registered";
        view("signUp.view.php", [
            "registerError" => $registerError
        ]);
        exit();
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // $db->query("INSERT INTO users(name, email, password)
        //             VALUES(:name, :email, :password)",[
        //                 ":name" => $name,
        //                 "email" => $username,
        //                 "password" => $hashedPassword
        // ]);
        echo "ADDED TO DATABASE";

        view("index.view.php", [
            "username" => $username,
            "password" => $password
        ]);
    }

    // if($validator->passes()) {
    //     $query = $db->query("SELECT email FROM users WHERE email = :username", [
    //         ":username" => $username
    //     ]);

    //     $isExisting = $query->fetch();

    //     if($isExisting){
    //         $registerError["registerError"] = "already registered";
    //     }
    // }
} 

view("signUp.view.php", [
    "registerError" => $registerError
]);