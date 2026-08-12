<?php

// $dsn = 'pgsql:' . "host=pg-38747106-shawngenese25.k.aivencloud.com;dbname=NotelyUsersDB;port=17259";

namespace App;

use PDO;

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username, $password)
    {
        try {
            $dsn = 'mysql:' . http_build_query($config, '', ';');
    
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (\PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }


    public function query($query, $parameters = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($parameters);

        return $this->statement;
    }

}
