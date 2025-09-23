<?php

declare(strict_types=1);

$entrada = trim(fgets(STDIN));

$entrada = explode(' ', $entrada);

$entrada = array_map("intval", $entrada);

$cantidad = count($entrada);

$suma = array_sum($entrada);

$promedio = $suma / $cantidad;

echo "Su promeido es $promedio";
