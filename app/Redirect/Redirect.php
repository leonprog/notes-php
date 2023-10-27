<?php

class Redirect
{
    public function url(string $url)
    {
        header("Location: $url");
        exit();
    }
}