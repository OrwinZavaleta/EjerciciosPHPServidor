<?php

namespace App\Middleware;

class LogMiddleware
{

    private $path = __DIR__ . "/../../log.txt";

    public function handle($headers)
    {
        $log = date('H:i:s') . " - ";

        $log .= ($_SERVER["REQUEST_METHOD"] . " - ");

        $log .= (($headers["Host"] ?? null) . " - ");

        $authHeader = $headers["Authorization"] ?? $headers["authorization"] ?? null;
        if ($authHeader) {
            $log .= "Usuario Autenticado - \n";
        } else {
            $log .= "Usuario NOO Autenticado - \n";
        }

        file_put_contents($this->path, $log, FILE_APPEND);

        error_log($log);
        error_log("Log creado");
    }
}
