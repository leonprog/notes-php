<?php

require_once 'app/Services/Route.php';
require_once 'app/Controllers/NoteController.php';

Route::get('/', new NoteController(), 'index');
Route::post('/store', new NoteController(), 'store');