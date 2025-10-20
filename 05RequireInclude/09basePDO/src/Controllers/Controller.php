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
}
