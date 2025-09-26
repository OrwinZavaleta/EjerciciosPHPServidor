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
        echo "\nSe destruyo el libro $this->titulo\n";
    }
}

class Revista extends Libro1
{
    private $numeroEdicion;

    public function __construct($titulo, $autor, $anio, $numeroEdicion)
    {
        parent::__construct($titulo, $autor, $anio);
        $this->numeroEdicion = $numeroEdicion;
    }

    public function mostrarInfo()
    {
        echo "$this->titulo escrito por $this->autor en el año $this->anio\nSu edicion es $this->numeroEdicion\n";
    }
}

$revista1 = new Revista("El problema de los 3 cuerpo", "Liu Cixin", 2006, 23);

$revista2 = new Revista("Hadrosauropolis", "Andoni Garrido Fernández", 2023, 2);

$revista1->mostrarInfo();
$revista2->mostrarInfo();
