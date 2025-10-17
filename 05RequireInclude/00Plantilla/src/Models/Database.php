<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $host = "127.0.0.1";
    private $dbname = "bbdd";
    private $username = "root";
    private $password = "25deMARZO2008";
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar: " + $e->getMessage());
        }
    }
}
