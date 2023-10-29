<?php

class Redirect
{
    /**
     * @param string $url
     * @return void
     */
    public static function url(string $url)
    {
        header("Location: $url");
        exit();
    }
}