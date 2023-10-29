<?php

require_once 'app/Services/Controller.php';
require_once 'app/Services/View.php';
require_once 'app/Contracts/RouteInterface.php';
require_once 'app/Services/Request.php';

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

    /**
     * @param string $path
     * @param Controller $controller
     * @param string $action
     * @return void
     */
    public static function get(string $path, Controller $controller, string $action): void
    {
        self::$list[] = [
            "path" => $path,
            "controller" => $controller,
            "action" => $action,
        ];
    }

    /**
     * @param string $path|
     * @param Controller $controller
     * @param string $action
     * @return void
     */
    public static function post(string $path, Controller $controller, string $action): void
    {
        self::$list[] = [
            "path" => $path,
            "controller" => $controller,
            "action" => $action,
        ];
    }

    /**
     * Метод, который обрабатывает запросы и вызывает контроллеры и их методы
     *
     * @return void
     */
    public function init(): void
    {
        $routes = self::$list;
        $method = $this->request->getMethod();
        $uri = $this->request->getUri();

        // Проверка на существования такого пути
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
