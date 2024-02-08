<?php

class Repository
{
    protected $connection;

    function __construct()
    {
        require __DIR__ . '/../config/dbConfig.php';

        try {
            $this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            http_response_code(503);
            exit();
        }
    }
}
