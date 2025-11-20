<?php

namespace App\Controllers;

use App\Models\Database;
use Dotenv\Dotenv;

class Controller
{

    //Instanciar el modelo
    private $myModel;

    public function __construct()
    {
        error_log("hola");
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../..");
        $dotenv->load();
        $this->myModel = new Database($_ENV["DB_HOST"], $_ENV["DB_PORT"], $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
        error_log("conectado");
    }

    public function index()
    {
        include __DIR__ . "/../../cliente.html";
    }

    public function getAll()
    {
        echo json_encode($this->myModel->loadDeps());
    }
    public function getId($id)
    {
        echo json_encode($this->myModel->loadDep($id));
    }
    public function create()
    {
        // $data = file_get_contents("php://input");
        $request = json_decode(file_get_contents("php://input"), true);
        $depart_no = $request["depart_no"];
        $dnombre = $request["dnombre"];
        $loc = $request["loc"];
        $this->myModel->createDep($depart_no, $dnombre, $loc);
        echo json_encode(["response" => "Departamento creado"]);
    }
    public function update($id)
    {
        $request = json_decode(file_get_contents("php://input"), true);
        // $depart_no = $request["depart_no"];
        $dnombre = $request["dnombre"];
        $loc = $request["loc"];
        $this->myModel->updateDep($id, $dnombre, $loc);
        echo json_encode(["response" => "Departamento actualizado"]);
    }
    public function delete($id)
    {
        $this->myModel->deleteDep($id);
        echo json_encode(["response" => "Departamento eliminado"]);
    }
}
