<?php

namespace App\Routes;

use App\Controllers\Controller;

$controller = new Controller();
// $path = $_SERVER["REQUEST_URI"];
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); //Para recordar.


switch ($path) {
    case '/':
        $controller->index();
        break;
    case '/listDepart':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->listDepart();
        }
        break;
    default:
        # code...
        break;
}
