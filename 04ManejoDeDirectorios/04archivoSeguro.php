<?php

$PATH = "usuarios.txt";
if (file_exists("./usuarios/")) {
    echo "La carpeta ya existia\n";
} else {
    mkdir("usuarios");
}

if (!file_exists($PATH)) {
    $file = fopen($PATH, "x");
    fclose($file);
} else {
    echo "El archivo ya existia.\n";
}

if (is_writable($PATH)) {
    $file = fopen($PATH, "r+"); //Lo abre al incio
    fseek($file, 0, SEEK_END);
    fwrite($file, "Paco  Jimenez\n");
    rename($PATH, "./usuarios/".date("Y-m-d_H-i-s")."-{$PATH}");

    fclose($file);
} else {
    echo "No tengo permisos de escritura.\n";
}
