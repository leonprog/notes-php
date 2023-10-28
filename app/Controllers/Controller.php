<?php

require_once 'app/Services/View.php';

class Controller
{
    public object $view;

    public function __construct()
    {
        $this->view = new View();
    }
}