<?php

class Libro
{
    public $titulo;
    public $autor;
    public $anio;

    public function mostrarInfo()
    {
        echo "$this->titulo escrito por $this->autor en el año $this->anio\n";
    }
}

$libro1 = new Libro();
$libro1->titulo = "El problema de los 3 cuerpo";
$libro1->autor = "Liu Cixin";
$libro1->anio = 2006;

$libro2 = new Libro();
$libro2->titulo = "Hadrosauropolis";
$libro2->autor = "Andoni Garrido Fernández";
$libro2->anio = 2023;

$libro1->mostrarInfo();
$libro2->mostrarInfo();
