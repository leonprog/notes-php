<?php

interface RouteInterface
{
    public static function get(string $path, Controller $controller, string $action): void;

    public static function post(string $path, Controller $controller, string $action): void;
}