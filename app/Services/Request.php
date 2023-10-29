<?php

class Request
{
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getPost(): array
    {
        return $_POST;
    }


}