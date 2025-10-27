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

    // public function index()
    // {
    //     include __DIR__ . "/../Views/home.php";
    // }

    public function listDepart()
    {
        $departamentos = $this->model->listDepart();
        $empleados = $this->model->listEmple();
        $departamento = false;
        include __DIR__ . "/../Views/home.php";
    }
    public function delDepart($request) //Funciona
    {
        $id = $request["id"];

        $this->model->delDepart($id);

        header("location: /");
    }
    public function updateDepartForm($request)
    {
        $id = $request["id"];

        $departamentos = $this->model->listDepart();
        $departamento = $this->model->getDepart($id);

        include __DIR__ . "/../Views/home.php";
    }
    public function updateDepart($request)
    {
        $depart_no = $request["id"];
        $dnombre = $request["nombre"];
        $loc = $request["ubicacion"];

        $this->model->updateDepart($depart_no, $dnombre, $loc);

        header("location: /");
    }
    // public function createDepartForm()
    // {
    //     include __DIR__ . "/../Views/createDepartForm.php";
    // }
    public function createDepart($request)
    {
        $depart_no = $request["id"];
        $dnombre = $request["nombre"];
        $loc = $request["ubicacion"];

        $this->model->insertDepart($depart_no, $dnombre, $loc);

        header("location: /");
    }
    public function createEmple($request)
    {
        $emple_no = $request["id"];
        $apellido = $request["apellido"];
        $oficio = $request["oficio"];
        $depart_no = $request["depart"];

        $this->model->insertEmple($emple_no, $apellido, $oficio, $depart_no);

        header("location: /");
    }
}
