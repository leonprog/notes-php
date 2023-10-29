<?php

class DataBase
{
    /**
     * @return PDO|PDOException
     */
    public static function startDB(): PDOException|PDO
    {
        return (new DataBase)->connection();
    }

    /**
     * @return PDO|PDOException
     */
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
