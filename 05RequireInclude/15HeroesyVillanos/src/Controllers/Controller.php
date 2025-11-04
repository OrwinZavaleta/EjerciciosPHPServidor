<?php

namespace App\Controllers;

use App\Models\Model;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    //Instanciar el modelo
    private $myModel;
    private $twig;

    public function __construct()
    {
        $this->myModel = new Model();

        $loader = new FilesystemLoader(__DIR__ . "/../Views");
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        echo $this->twig->render("pages/personajes.html.twig", ["personajes" => $this->myModel->all()]);
    }
}
