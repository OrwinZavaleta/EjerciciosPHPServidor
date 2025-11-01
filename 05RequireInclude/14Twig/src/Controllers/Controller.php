<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    private $twig;
    //Instanciar el modelo

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . "/../Views");
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        echo $this->twig->render("home.html.twig");
    }
    public function about()
    {
        echo $this->twig->render("about.html.twig");
    }
    public function lista()
    {
        echo $this->twig->render("lista.html.twig", [
            "departamentos" => [
                ["nombre" => "depa1"],
                ["nombre" => "depa2"],
                ["nombre" => "depa3"],
            ]
        ]);
    }
}
