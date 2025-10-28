<?php

namespace App\Models;

use PDO;
use PDOException;
use MongoDB\Client;
use MongoDB\BSON\ObjectId;

class Database
{
    private $db;

    public function __construct()
    {

        try {
            $client = new Client("mongodb://localhost:27017");

            $this->db = $client->empledepart;
            error_log("Conectado a la base de datos");
        } catch (\Exception $e) {
            echo "Error al conectar a Mongo " . $e->getMessage();
        }
    }

    public function loadDeps()
    {
        $colection = $this->db->depart;

        $deps = $colection->find();

        return $deps;
    }

    public function loadDep($id)
    {
        $colection = $this->db->depart;

        $dep = $colection->findOne([
            "_id" => new ObjectId($id),
        ]);

        // print_r($dep);

        return $dep;
    }

    public function insertDep($a, $b, $c)
    {
        $colection = $this->db->depart;

        $resultado = $colection->insertOne([
            "depart_no" => $a,
            "dnombre" => $b,
            "loc" => $c,
        ]);

        return $resultado->getInsertedId();
    }

    public function updateDep($id, $a, $b, $c)
    {
        $colection = $this->db->depart;

        $resultado = $colection->updateOne(
            [
                "_id" => new ObjectId($id),
            ],
            [
                '$set' => [
                    "depart_no" => $a,
                    "dnombre" => $b,
                    "loc" => $c,
                ]
            ]
        );
    }

    public function deleteDep($id)
    {
        $colection = $this->db->depart;

        $resultado = $colection->deleteOne([
            "_id" => new ObjectId($id),
        ]);

        return $resultado->getDeletedCount();
    }
}
