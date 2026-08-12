<?php

/**
 * @var array $config
 */

use App\Validator;
use App\Database;

$validator = new Validator();

$db = new Database(
    $config["database"],
    $config["username"], 
    $config["password"]
);

$loginError = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SIGN_IN"])) {

    $username = $_POST["username"];
    $rawPassword = $_POST["password"];

    $validator->required("email", $username)
              ->email("email", $username)
              ->required("password", $rawPassword)
              ->min("password", $rawPassword, 6)
              ->max("password", $rawPassword, 25);

    $loginError = $validator->errors();

    if ($validator->passes()) {
        $query = $db->query("SELECT email, password FROM users WHERE email = :username", [
            ":username" => $username
        ]);

        $isExisting = $query->fetch();

        if (!$isExisting) {
            $loginError["loginError"] = "Invalid username or password";
        } else {
            if (password_verify($rawPassword, $isExisting["password"])) {
                echo "YOu are logged in";
                header("Location: /notes");
                exit();
            } else if ($isExisting["password"] == $rawPassword) {
                echo "YOu are logged in. Palitan mo password mo hindi pa naka hash";
                header("Location: /notes");
                exit();
            } else {
                echo "invalid. register ka muna";
                $loginError["loginError"] = "Invalid username or password";
            }   
            
        }
    }
    
}

view("index.view.php", [
    "loginError" => $loginError
]);

