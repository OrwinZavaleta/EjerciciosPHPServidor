<?php

require "./../vendor/autoload.php";

use Dotenv\Dotenv;
use Firebase\JWT\JWT;

// $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
// $dotenv->load();

// $key = $_ENV["KEY"];
$key = "juan";

$payload = [
    "iss" => "heep://localhost:8000",
    "aud" => "heep://localhost:8000",
    "iad" => time(),
    "exp" => time() + 3600,
    "user_id" => "Orwin",
];


$jwt = JWT::encode($payload, $key, "HS256");

echo json_encode(["token" => $jwt]);
