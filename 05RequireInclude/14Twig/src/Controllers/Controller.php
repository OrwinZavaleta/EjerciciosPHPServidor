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
        include __DIR__ . "/../Views/home.html";
    }
}
