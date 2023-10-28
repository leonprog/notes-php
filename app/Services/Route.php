<?php

require_once 'app/Controllers/Controller.php';
require_once 'app/Services/View.php';
require_once 'app/Contracts/RouteInterface.php';

class Route implements RouteInterface
{
    public static function get(string $route, Controller $controller, string $action): void
    {
        if (self::isMatch($route)) {
            $object = new $controller;
            $object->$action();
        } else {
            self::error();
        }
    }

    public static function post(string $route, Controller $controller, string $action): void
    {
        if (self::isMatch($route) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $object = new $controller;
            $data = $_POST;
            $object->$action($data);
        }
    }

    private static function isMatch(string $route): bool
    {
        $uri = $_SERVER['REQUEST_URI'];
        return $route === $uri;
    }

    private static function error(): void
    {
        $view = new View();
        $view->view('404');
    }
}
