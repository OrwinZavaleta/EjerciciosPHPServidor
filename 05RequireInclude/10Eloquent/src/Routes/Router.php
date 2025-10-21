<?php

namespace App\Routes;

use App\Controllers\Controller;

$controller = new Controller();
// $path = $_SERVER["REQUEST_URI"];
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); //Para recordar.


switch ($path) {
    case '/':
        // $controller->index();
        $controller->listDepart($_GET);
        break;
    // case '/listDepart':
    //     if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //         $controller->listDepart($_GET);
    //     }
    //     break;
    case '/delDepart':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->delDepart($_GET);
        }
        break;
    case '/updateDepartForm':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->updateDepartForm($_GET);
        }
        break;
    case '/updateDepart':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->updateDepart($_POST);
        }
        break;
    // case '/createDepartForm':
    //     if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //         $controller->createDepartForm($_GET);
    //     }
    //     break;
    case '/createDepart':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->createDepart($_POST);
        }
        break;
    default:
        # code...
        break;
}
