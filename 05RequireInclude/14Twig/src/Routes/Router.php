<?php

namespace App\Routes;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $this->routes["/"] = ["controller" => "Controller", "action" => "index"];
        $this->routes["/about"] = ["controller" => "Controller", "action" => "about"];
        $this->routes["/lista"] = ["controller" => "Controller", "action" => "lista"];
    }

    public function handleRequest()
    {
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (isset($this->routes[$path])) {
            $route = $this->routes[$path];

            $controllerClass = "\\App\\Controllers\\" . $route["controller"];
            error_log($controllerClass);
            $action = $route["action"];
            error_log($action);
            if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                $controller = new $controllerClass();
                $controller->$action($_REQUEST);
            } else {
                echo "error1";
            }
        } else {
            echo "error";
        }
    }
}


$router = new Router();

$router->handleRequest();
