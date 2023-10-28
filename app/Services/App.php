<?php

require_once 'app/Services/DataBase.php';

class App
{
    public static function start() : void
    {
        self::db();
    }


    private static function db()
    {
        DataBase::startDB();
    }
}