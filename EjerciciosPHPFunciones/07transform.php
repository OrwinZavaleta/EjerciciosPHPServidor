<?php

$nombres = ["pepe", "juan", "alberto"];

$nombresUpper = array_map(function ($nom) {
    return strtoupper($nom);
}, $nombres);

$nombresSr = array_map(function ($nom) {
    return "Sr./Sra. " . $nom;
}, $nombresUpper);

print_r($nombresSr);
