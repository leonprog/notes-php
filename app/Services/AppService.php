<?php

require_once 'app/Services/DataBaseService.php';

class AppService
{
    public static function start() : void
    {
        self::db();
    }


    private static function db()
    {
        DataBaseService::startDB();
    }
}