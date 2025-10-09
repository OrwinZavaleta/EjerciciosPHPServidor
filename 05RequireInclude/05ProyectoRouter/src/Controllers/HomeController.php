<?php

namespace Orwin\Proyecto2\Controllers;

class HomeController
{
    public function index()
    {
        $path = __DIR__ . "/../Views/home.html";
        if (file_exists($path)) {
            echo file_get_contents($path);
        } else {
            http_response_code(418);
            echo "418 I'm a teapod...";
        }
    }
    public function formulario()
    {
        $path = __DIR__ . "/../Views/formulario.html";

        if (file_exists($path)) {
            echo file_get_contents($path);
        } else {
            http_response_code(418);
            echo "418 I'm a teapod...";
        }
    }
    public function procesar($datos)
    {
        $path = __DIR__ . "/../Views/bienvenido.php";

        if (isset($datos['nombre']) && !empty($datos['nombre'])) {
            if (file_exists($path)) {
                $nombre = htmlspecialchars($datos['nombre']);

                ob_start();

                require $path;

                echo ob_get_clean();
            } else {
                http_response_code(418);
                echo "418 I'm a teapod...";
            }
        } else {
            echo "<h1>Por favor introduce un nombre valido.</h1>";
        }
    }
    public function about()
    {
        $path = __DIR__ . "/../Views/about.html";
        if (file_exists($path)) {
            echo file_get_contents($path);
        } else {
            http_response_code(418);
            echo "418 I'm a teapod...";
        }
    }
    public function contacto()
    {
        $path = __DIR__ . "/../Views/contacto.html";
        if (file_exists($path)) {
            echo file_get_contents($path);
        } else {
            http_response_code(418);
            echo "418 I'm a teapod...";
        }
    }
}
