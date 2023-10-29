<?php

require_once 'app/Services/DataBase.php';
require_once 'app/Services/Route.php';

class App
{
    public static function start() : void
    {
        DataBase::startDB();

        $route = new Route();
    }

}