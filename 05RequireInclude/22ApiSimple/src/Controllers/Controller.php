<?php

namespace App\Controllers;

use App\Models\Database;

class Controller
{
    //Instanciar el modelo
    // private $myModel;

    public function __construct()
    {
        // $this->myModel = new Database();
    }

    public function getAll()
    {
        http_response_code(200);
        echo json_encode(["mensaje" => "Listado de todos los departamentos"]);
    }
    public function getId($id)
    {
        http_response_code(200);
        echo json_encode(["mensaje" => "Mostrando departamento con id: $id"]);
    }
    public function create()
    {
        http_response_code(201);
        echo json_encode(["mensaje" => "Departamento creado exitosamente."]);
    }
    public function update($id)
    {
        http_response_code(200);
        echo json_encode(["mensaje" => "Departamento con id $id actualizado exitosamente"]);
    }
    public function delete($id)
    {
        http_response_code(200);
        echo json_encode(["mensaje" => "Departamento con id $id eliminado exitosamente"]);
    }
}
