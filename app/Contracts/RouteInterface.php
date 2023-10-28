<?php

interface RouteInterface
{
    public static function get(string $route, Controller $controller, string $action): void;

    public static function post(string $route, Controller $controller, string $action): void;
}