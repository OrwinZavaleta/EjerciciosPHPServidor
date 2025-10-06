<?php

namespace Orwin\ProyectoWeb\Routes;

use Orwin\ProyectoWeb\Controllers\HomeController;

$controllador = new HomeController();

$ruta = $_SERVER['REQUEST_URI'];
error_log($ruta);

switch ($ruta) {
    case '/':
        $controllador->index();
        break;
    case '/procesar':
        $controllador->procesar($_POST);
        break;
    default:
        http_response_code(418);
        echo "418 I'm a teapod...";
        break;
}
