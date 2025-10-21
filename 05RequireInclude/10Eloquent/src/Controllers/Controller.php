<?php

namespace App\Controllers;

use App\Models\Database;

class Controller
{
    //Instanciar el modelo
    private $model;

    public function __construct()
    {
        $this->model = new Database();
    }

    public function index()
    {
        include __DIR__ . "/../Views/home.php";
    }

    public function listDepart()
    {
        $departamentos = $this->model->listDepart();
        include __DIR__ . "/../Views/listDepart.php";
    }
    public function delDepart($request) //Funciona
    {
        $id = $request["id"];

        $this->model->delDepart($id);

        header("location: /listDepart");
    }
    public function updateDepartForm($request)
    {
        $id = $request["id"];
        
        $departamento = $this->model->getDepart($id);

        include __DIR__ . "/../Views/updateDepartForm.php";
    }
    public function updateDepart($request)
    {
        $depart_no = $request["id"];
        $dnombre = $request["nombre"];
        $loc = $request["ubicacion"];

        $this->model->updateDepart($depart_no, $dnombre, $loc);

        header("location: /listDepart");
    }
    public function createDepartForm()
    {
        include __DIR__ . "/../Views/createDepartForm.php";
    }
    public function createDepart($request)
    {
        $depart_no = $request["id"];
        $dnombre = $request["nombre"];
        $loc = $request["ubicacion"];

        $this->model->insertDepart($depart_no, $dnombre, $loc);

        header("location: /listDepart");
    }
}
