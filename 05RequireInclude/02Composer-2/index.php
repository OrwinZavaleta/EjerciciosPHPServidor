<?php

require 'vendor/autoload.php';

use Orwin\Proyecto\Controllers\UsuarioController;
use Orwin\Proyecto\Models\Usuario;

$controller = new UsuarioController();

$controller->index();

$usuario = new Usuario();

$usuario->saludar();
