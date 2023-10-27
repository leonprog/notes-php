<?php

require_once 'app/Models/Note.php';
require_once 'app/Services/AppService.php';
require_once 'routes/web.php';

AppService::start();

$data = [
    'text' => 'fdsfsdafdscds',
];

//Note::create($data);
Note::get();

