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

    // Para los select que si devuelven algo
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

    // Para las otras 3 que no devuelven nada
    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Hubo un error en la ejecucion: " . $e->getMessage());
        }
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

    public function insertDepart($depart_no, $dnombre, $loc)
    {
        $sql = "INSERT INTO depart VALUES(:depart_no, :dnombre, :loc)";
        return $this->execute($sql, [":depart_no" => $depart_no, ":dnombre" => $dnombre, ":loc" => $loc]);
    }

    public function updateDepart($depart_no, $dnombre, $loc)
    {
        $sql = "UPDATE depart SET dnombre=:dnombre, loc=:loc WHERE depart_no=:depart_no";
        return $this->execute($sql, [":depart_no" => $depart_no, ":dnombre" => $dnombre, ":loc" => $loc]);
    }
    public function deleteDepart($id)
    {
        $sql = "DELETE FROM depart WHERE depart_no=:id";
        return $this->execute($sql, [":id" => $id]);
    }
}
