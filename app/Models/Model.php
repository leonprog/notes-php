<?php

require_once 'app/Services/DataBaseService.php';

class Model extends DataBaseService
{

    protected string $table = '';

    static \PDO $pdo;

    public function __construct()
    {
        self::$pdo = parent::startDB();
    }

    public static function create(array $data) : int|PDOException
    {
        $table = (new static())->table;

        $fields = array_keys($data);

        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(fn($field) => ":$field", $fields));

        $sql = "INSERT INTO $table ($columns) VALUES ($binds)";

        $stmt = self::$pdo->prepare($sql);

        try {
            $stmt->execute($data);
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }

        return self::$pdo->lastInsertId();
    }

    public static function get(): bool|array
    {
        $table = (new static())->table;

        $sql = "SELECT * FROM $table";

        $stmt = self::$pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

