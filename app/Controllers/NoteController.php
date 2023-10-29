<?php

require_once 'app/Services/Controller.php';
require_once 'app/Services/View.php';
require_once 'app/Models/Note.php';
require_once 'app/Services/Redirect.php';

class NoteController extends Controller
{
    public function index() : void
    {
        $notes = Note::get();

        $this->view->view('index', ['notes' => $notes]);
    }

    public function store(array $data) : void
    {
        Note::create($data);

        Redirect::url('/');
    }
}