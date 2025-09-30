<?php

function forzarBorrado($directorio)
{
    $listado = scandir($directorio);

    foreach ($listado as $parte) {
        if ($parte == "." || $parte == "..") {
            continue;
        } elseif (is_dir("$directorio/$parte")) {
            forzarBorrado("$directorio/$parte");
        } else {
            unlink("$directorio/$parte");
        }
    }
    rmdir($directorio);
}

$PATH1 = "./mis_archivos/archivo1.txt";
$PATH2 = "./mis_archivos/archivo2.txt";
// Se crea la carpeta
if (mkdir("./mis_archivos")) {
    echo "Se creó la carpeta correctamente.\n";
} else {
    die("Hubo un fallo al crear la carpeta.\n");
}
// Se crea y abre un archivo y asigna el manejador
$archivo1 = fopen($PATH1, "w");
$archivo2 = fopen($PATH2, "w");

// Se notifica si se han creado
if ($archivo1) {
    echo "Se creó el archivo 1 correctamente.\n";
} else {
    die("Hubo un fallo al crear el archivo 1.\n");
}
if ($archivo2) {
    echo "Se creó el archivo 2 correctamente.\n";
} else {
    die("Hubo un fallo al crear el archivo 2.\n");
}

// Escane el directorio
$listado = scandir("./mis_archivos");

// Los muestro por consola
if (count($listado) != 0) {
    echo "Los aechivos son: \n";
    print_r($listado);
} else {
    die("Hubo un fallo al listar la carpeta.\n");
}

// Escribo en los archivos
fwrite($archivo1, "No me quiero ir Señor Stark.\n");
fwrite($archivo2, "Yo soy groot.\n");

fclose($archivo1);
fclose($archivo2);

// Se borran los archivos
if (unlink($PATH1)) {
    echo "Se ha borrado el archivo con éxito.\n";
} else {
    die("No se ha podido borrar el archivo 1.\n");
}
if (unlink($PATH2)) {
    echo "Se ha borrado el archivo con éxito.\n";
} else {
    die("No se ha podido borrar el archivo 1.\n");
}

// Borro el directorio
// forzarBorrado("./mis_archivos");
rmdir("./mis_archivos");
