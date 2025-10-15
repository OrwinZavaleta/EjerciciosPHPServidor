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
    default:
        # code...
        break;
}
