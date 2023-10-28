<?php

class Redirect
{
    public static function url(string $url)
    {
        header("Location: $url");
        exit();
    }
}