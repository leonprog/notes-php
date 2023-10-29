<?php

interface ViewInterface
{
    public function view(string $name, array $data = []): mixed;

    public function components(string $name) : mixed;
}