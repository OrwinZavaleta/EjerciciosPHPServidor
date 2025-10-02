<?php

$PATH = "archivoGrande.txt";

$file = fopen($PATH, "w");
if (is_writable($PATH)) {
    for ($i = 0; $i < 100; $i++) {
        fwrite($file, "Hola como estas\n");
    }
    fclose($file);
}



$file = fopen($PATH, "r");
$contador = 1;
while (!feof($file)) {
    echo "$contador. =======\n" . fread($file, 1024);
    $contador++;
}

fseek($file, 0, SEEK_SET);

$contador = 1;
while (!feof($file)) {
    echo "$contador. " . fgets($file);
    $contador++;
}