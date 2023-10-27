<?php

class View
{
    public function view(string $name, array $data = [])
    {
        $path = "public/views/pages/$name.php";

        if (!file_exists($path)) {
            throw new \Exception("Not found page");
        }

        extract([
            'view' => $this,
            ...$data
        ]);

        return require_once $path;
    }

    public function components(string $name)
    {
        return require_once "public/views/components/$name.php";
    }
}