<?php

class EdadInvalidaException extends Exception {}

function verificarEdad($edad)
{
    if ($edad < 18) {
        throw new EdadInvalidaException("La edad debe ser mayor de 18");
    } else {
        return "Acceso permitido";
    }
}


$edad = 17;

try {
    echo verificarEdad($edad);
} catch (EdadInvalidaException $e) {
    echo $e->getMessage();
}

