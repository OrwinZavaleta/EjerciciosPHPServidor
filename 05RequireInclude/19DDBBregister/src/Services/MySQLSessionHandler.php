<?php

use SessionHandlerInterface;
use PDO;

/* class MySQLSessionHandler implements SessionHandlerInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function open(string $sabePath, string $sessionName): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read(string $id): string
    {
        $stmt - $this->pdo->prepare("SELECT data FROM php_sessions WHERE id=:id");
    }
}
 */