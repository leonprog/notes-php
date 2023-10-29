<?php

require_once 'app/Controllers/Controller.php';
require_once 'app/Services/View.php';
require_once 'app/Models/Note.php';
require_once 'app/Http/Redirect.php';

class NoteController extends Controller
{
    public function index() : void
    {
//        $view = new View();

        $notes = Note::get();

        $this->view->view('index', ['notes' => $notes]);

    }

    public function store(array $data) : void
    {
        Note::create($data);

        Redirect::url('/');
    }
}