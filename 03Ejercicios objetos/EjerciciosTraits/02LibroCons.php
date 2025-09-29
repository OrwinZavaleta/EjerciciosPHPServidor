<?php

class Libro1
{
    public $titulo;
    public $autor;
    public $anio;

    public function __construct($titulo, $autor, $anio){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
    }

    public function mostrarInfo()
    {
        echo "$this->titulo escrito por $this->autor en el año $this->anio\n";
    }

    public function __destruct()
    {
        echo "Se destruyo el libro $this->titulo";
    }
}

$libro1 = new Libro1("El problema de los 3 cuerpo", "Liu Cixin", 2006);

$libro2 = new Libro1("Hadrosauropolis", "Andoni Garrido Fernández", 2023);

$libro1->mostrarInfo();
$libro2->mostrarInfo();
