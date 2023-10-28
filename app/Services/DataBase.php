<?php

class DataBase
{
    public static function startDB()
    {
        return (new DataBase)->connection();
    }

    private function connection(): PDO|PDOException
    {
        $config = require_once "config/db.php";

        try {
            $pdo =  new PDO("mysql:host=localhost;dbname=notes", 'root', 'root');
            return $pdo;
        } catch(\PDOException $exception) {
            exit($exception->getMessage());
        }


    }
}
