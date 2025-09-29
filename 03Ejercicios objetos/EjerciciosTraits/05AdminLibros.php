<?php

interface Prestable
{
    public function prestar();
    public function devolver();
    public function estaPrestado();
}

class Libro1 implements Prestable
{
    public $titulo;
    public $autor;
    public $anio;
    public $estaPrestado = false;

    public function __construct($titulo, $autor, $anio)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
    }

    public function mostrarInfo()
    {
        echo "{$this->titulo} escrito por {$this->autor} en el año {$this->anio}\n";
    }

    public function estaPrestado()
    {
        if ($this->estaPrestado) {
            echo "El libro {$this->titulo} se encuentra en prestamo, no disponible.\n";
        } else {
            echo "El libro {$this->titulo} se encuentra disponible\n";
        }
    }

    public function prestar()
    {
        if ($this->estaPrestado) {
            $this->estaPrestado = true;
            echo "Acabas de recibir el libro {$this->titulo}\n";
        } else {
            echo "El libro {$this->titulo} no se puede prestar\n";
        }
    }

    public function devolver()
    {
        if (!$this->estaPrestado) {
            $this->estaPrestado = false;
            echo "Acabas de devolver el libro {$this->titulo}.\n";
        } else {
            echo "El libro {$this->titulo} ya lo tenemos, porque hay 2???????\n";
        }
    }

    public function __destruct()
    {
        echo "\nSe destruyo el libro {$this->titulo}\n";
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
        echo "{$this->titulo} escrito por {$this->autor} en el año {$this->anio}\nSu edicion es {$this->numeroEdicion}\n";
    }
}

function mostrarColeccion($items)
{
    array_map(function ($e) {
        $e->mostrarInfo();
    }, $items);
}

$libro1 = new Libro1("El problema de los 3 cuerpo", "Liu Cixin", 2006);

$libro2 = new Libro1("Hadrosauropolis", "Andoni Garrido Fernández", 2023);

$revista1 = new Revista("El problema de los 3 cuerpo", "Liu Cixin", 2006, 23);

$revista2 = new Revista("Hadrosauropolis", "Andoni Garrido Fernández", 2023, 2);

$coleccionLR = [$libro1, $revista1, $libro2, $revista2];

mostrarColeccion($coleccionLR);

echo "======================================================\n";
$libro1->estaPrestado();
$libro1->prestar();
$libro1->estaPrestado();
$libro1->devolver();
