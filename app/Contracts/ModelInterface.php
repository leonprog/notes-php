<?php

interface ModelInterface
{
    public static function get(): bool|array;

    public static function create(array $data): int|PDOException;
}