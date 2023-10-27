<?php

require_once 'app/Controllers/Controller.php';
require_once 'app/Services/View.php';

class Route
{
    public static function get(string $route, Controller $controller, string $action) : void
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($route === $uri) {
            $object = new $controller;

            $controller->$action();
        } else {
            self::error();
        }

    }

    public static function post(string $route, Controller $controller, string $action)
    {
        $data = $_POST;

        $uri = $_SERVER['REQUEST_URI'];

        if ($route === $uri) {
            $object = new $controller;

            $controller->$action($data);
        } else {
            self::error();
        }
    }

    private static function error() : void
    {
        $view = new View();

        $view->view('404');
    }
}