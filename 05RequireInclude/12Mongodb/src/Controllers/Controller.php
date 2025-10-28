<?php

namespace App\Controllers;

use App\Models\Database;

class Controller
{
    //Instanciar el modelo
    private $myModel;

    public function __construct()
    {
        $this->myModel = new Database();
    }

    public function index()
    {
        $departamentos = $this->myModel->loadDeps();

        $contenido = "listado.php";

        include __DIR__ . "/../Views/plantilla.php";
    }

    public function createDepartForm()
    {
        $contenido = "createDepartForm.php";
        include __DIR__ . "/../Views/plantilla.php";
    }

    public function createDepart($request)
    {
        $depart_no = $request["depart_no"];
        $dnombre = $request["dnombre"];
        $loc = $request["loc"];

        error_log("se llego a la creacion");
        $this->myModel->insertDep($depart_no, $dnombre, $loc);

        header("location: /");
    }

    public function delDepart($request){
        $_id = $request["depart_no"];

        $this->myModel->deleteDep($_id);
        header("location: /");
    }

    public function updateDepartForm($request){
        $_id = $request["depart_no"];

        $dep = $this->myModel->loadDep($_id);

        $contenido = "updateDepartForm.php";
        // print_r($dep);
        include __DIR__. "/../Views/plantilla.php";
    }

    public function updateDepart($request){
        $depart_no = $request["depart_no"];
        $dnombre = $request["dnombre"];
        $loc = $request["loc"];

        $_id = $request["_id"];

        $this->myModel->updateDep($_id, $depart_no, $dnombre, $loc);

        header("location: /");
    }
}
