<?php

class View
{
    /**
     * @param string $name
     * @param array $data
     * @throws Exception
     * @return mixed
     */
    public function view(string $name, array $data = []): mixed
    {
        $path = "public/views/pages/$name.php";

        if (!file_exists($path)) {
            throw new \Exception("Not found page");
        }

        // Здесь передаем view и data на страницу
        extract([
            'view' => $this,
            ...$data
        ]);

        return require_once $path;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function components(string $name) : mixed
    {
        return require_once "public/views/components/$name.php";
    }
}