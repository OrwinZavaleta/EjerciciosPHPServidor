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
        $this->routes["GET"]["/cliente"] = ["controller" => "Controller", "action" => "index"];
        $this->routes["GET"]["/api/departs"] = ["controller" => "Controller", "action" => "getAll"];
        $this->routes["GET"]["/api/departs/{id}"] = ["controller" => "Controller", "action" => "getId"];
        $this->routes["POST"]["/api/departs/create"] = ["controller" => "Controller", "action" => "create"];
        $this->routes["PUT"]["/api/departs/{id}"] = ["controller" => "Controller", "action" => "update"];
        $this->routes["DELETE"]["/api/departs/{id}"] = ["controller" => "Controller", "action" => "delete"];
    }


    public function handleRequest()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $parsedUrl = parse_url($_SERVER["REQUEST_URI"]);

        // $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); //Para recordar

        $path = rtrim($parsedUrl["path"], "/");

        $parts = explode("/", trim($path, "/"));

        $paramValue = null;

        if (is_numeric(end($parts))) {
            $paramValue = array_pop($parts);
            $path = "/" . implode("/", $parts) . "/{id}";
        }

        if ($this->routes[$method][$path]) {
            $route = $this->routes[$method][$path];
            $controllerClass = "\\App\\Controllers\\" . $route["controller"];
            $action = $route["action"];
            error_log(" controller $controllerClass , action $action");
            if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                $controller = new $controllerClass();
                if ($paramValue) {
                    $controller->$action($paramValue);
                } else {
                    $controller->$action();
                }
            } else {
                http_response_code(404);
                echo json_encode(["error" => "recurso no encontrado 1"]);
            }
        } else {
            http_response_code(404);
            echo json_encode(["error" => "recurso no encontrado 2"]);
        }
    }
}

$router = new Router();

$router->handleRequest();
