<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $host = "127.0.0.1";
    private $dbname = "01pdo";
    private $username = "root";
    private $password = "";
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            error_log("base de datos conectadas");
        } catch (PDOException $e) {
            die("Error al conectar: " . $e->getMessage());
        }
    }
    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("error en la consulta: " . $e->getMessage());
        }
    }

    public function execute() {

    }

    public function listDepart()
    {
        $sql = "SELECT * FROM depart";
        return $this->query($sql);
    }

    public function getDepart($id)
    {
        $sql = "SELECT * FROM depart WHERE depart_no=:id";
        return $this->query($sql, [":id" => "$id"]);
    }
}
