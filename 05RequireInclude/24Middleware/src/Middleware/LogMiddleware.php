<?php

namespace App\Middleware;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LogMiddleware
{

    private $path = __DIR__ . "/../../log.log";

    private $key;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        $this->key = $_ENV["KEY"];
    }
    public function handle($headers)
    {
        $log = date('H:i:s') . " - ";

        $log .= ($_SERVER["REQUEST_METHOD"] . " - ");

        $log .= ((parse_url($_SERVER["REQUEST_URI"])["path"] ?? null) . " - ");


        $authHeader = $headers["Authorization"] ?? $headers["authorization"] ?? null;

        if (!$authHeader) {
            $log .= "Usuario No registrado - \n";
        } else {
            $token = str_replace("Bearer ", "", $authHeader);

            try {
                $decoded = JWT::decode($token, new Key($this->key, "HS256"));
                $log .= ("Usuario validado" . " -  \n");
            } catch (\Exception $e) {
                $log .= ("Token invalido" . " -  \n");
            }
        }

        file_put_contents($this->path, $log, FILE_APPEND);

        error_log($log);
        error_log("Log creado");
    }
}
