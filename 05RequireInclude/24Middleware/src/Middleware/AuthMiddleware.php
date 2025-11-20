<?php

namespace App\Middleware;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

final class AuthMiddleware
{
    private $key;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        $this->key = $_ENV["KEY"];
    }

    public function handle($header)
    {
        $authHeader = $header["Authorization"] ?? $header["authorization"] ?? null;
        if (!$authHeader) {
            error_log(json_encode($header));
            http_response_code(401);
            echo json_encode(["error" => "acceso no autorizado"]);
            exit;
        }

        $token = str_replace("Bearer ", "", $authHeader);

        try {
            $decoded = JWT::decode($token, new Key($this->key, "HS256"));
            return (array) $decoded;
        } catch (\Exception $e) {
            http_response_code(401);
            echo json_encode(["error" => "token invalido o expirado", "details" => $e->getMessage()]);
            exit;
        }
    }
}
