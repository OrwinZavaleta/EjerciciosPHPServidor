<?php

$PATH = "frutas.txt";

if (is_readable($PATH)) {
    // ===== Leyendo el archivo =====
    $file = fopen($PATH, "r");

    if ($file) {
        $contenido = fread($file, filesize($PATH));
        echo $contenido;
        fclose($file);
    }


    // ===== Leyendo una línea del archivo =====
    $fileLine = fopen($PATH, "r");

    if ($fileLine) {
        $linea = fgets($fileLine);
        echo $linea;
        fclose($fileLine);
    }
} else {
    echo "No se puede leer el archivo.";
}
