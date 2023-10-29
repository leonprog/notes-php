<?php

class Request
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $_POST;
    }


}