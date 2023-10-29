<?php

class DataBase
{
    public static function startDB()
    {
        return (new DataBase)->connection();
    }

    private function connection(): PDO|PDOException
    {
        $config = require "config/db.php";

        try {
            $pdo =  new PDO("mysql:host={$config['host']};dbname={$config['db_name']}", $config['username'], $config['password']);
            return $pdo;
        } catch(\PDOException $exception) {
            exit($exception->getMessage());
        }


    }
}
