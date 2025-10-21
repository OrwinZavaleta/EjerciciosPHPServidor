<?php

namespace App\Controllers;

use App\Models\Depart;

class Controller
{
    //Instanciar el modelo
    // private $model;

    public function __construct()
    {
        new \App\Models\Database();
        // $this->model = new Depart();
    }

    public function index()
    {
        include __DIR__ . "/../Views/home.php";
    }

    public function listDepart()
    {
        // $departamentos = $this->model->listDepart();
        $departamentos = Depart::all();
        include __DIR__ . "/../Views/listDepart.php";
    }
    public function delDepart($request) //Funciona
    {
        $id = $request["id"];

        // $this->model->deleteDepart($id);

        $depa = Depart::find($id);
        if ($depa) {
            $depa->delete();
            error_log("Se elimino con exito");
        } else {
            error_log("Error al eliminar.");
        }


        header("location: /listDepart");
    }
    public function updateDepartForm($request)
    {
        $id = $request["id"];

        $departamento = Depart::find($id);

        include __DIR__ . "/../Views/updateDepartForm.php";
    }
    public function updateDepart($request)
    {
        $depart_no = $request["id"];
        $dnombre = $request["nombre"];
        $loc = $request["ubicacion"];

        // $this->model->updateDepart($depart_no, $dnombre, $loc);

        $depa = Depart::find($depart_no);
        if ($depa) {
            $depa->dnombre = $dnombre;
            $depa->loc = $loc;
            error_log("Actualizado con exito el departamento");
        } else {
            error_log("ese depart no existe.");
        }

        $depa->save();

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

        // $this->model->insertDepart($depart_no, $dnombre, $loc);

        try {
            Depart::create([
                "depart_no" => $depart_no,
                "dnombre" => $dnombre,
                "loc" => $loc,
            ]);
            error_log("Se creo correctamente el departamento");
        } catch (\Exception $e) {
            error_log("Error al crear el departamento");
        }

        header("location: /listDepart");
    }
}
