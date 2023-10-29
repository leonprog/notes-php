<?php

require_once 'app/Controllers/Controller.php';
require_once 'app/Services/View.php';
require_once 'app/Contracts/RouteInterface.php';
require_once 'app/Http/Request.php';

class Route implements RouteInterface
{
    protected Request $request;
    protected View $view;

    private static array $list = [];

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
        $this->init();
    }

    public static function get(string $path, Controller $controller, string $action): void
    {
        self::$list[] = [
            "path" => $path,
            "controller" => $controller,
            "action" => $action,
        ];
    }

    public static function post(string $path, Controller $controller, string $action): void
    {
        self::$list[] = [
            "path" => $path,
            "controller" => $controller,
            "action" => $action,
        ];
    }

    public function init(): void
    {
        $routes = self::$list;
        $method = $this->request->getMethod();
        $uri = $this->request->getUri();

        if (!(in_array($uri, array_column($routes, 'path')))) {
            $this->error();
            die();
        }

        foreach ($routes as $route) {
            $object = new $route['controller'];
            $action = $route['action'];

            if ($route['path'] === $uri) {

                if ($method === 'POST') {
                    $data = $this->request->getPost();
                    $object->$action($data);
                }

                if ($method === 'GET') {
                    $object->$action();
                }

            }
        }
    }

    private function error(): void
    {
        $this->view->view('404');
    }
}
