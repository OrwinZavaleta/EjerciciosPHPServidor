<?php

// require_once __DIR__ . "/Services/MySQLSessionHandle.php";

use App\Services\MySQLSessionHandler;

$pdo = new PDO("mysql:host=localhost;dbname=loginout;charset=utf8", "root", "");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (session_status() === PHP_SESSION_NONE) {
    $handler = new MySQLSessionHandler($pdo);
    session_set_save_handler($handler, true);

    session_start();
}
