<?php

interface Prestable
{
    public function prestar();
    public function devolver();
    public function estaPrestado();
}

trait Identificable
{
    private $id;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
}

abstract class MaterialBibioteca
{
    private $titulo;
    private $autor;
    private $anio;

    abstract function mostrarInfo();

    function esAntiguo()
    {
        if ($this->anio < 2000) {
            return true;
        } else {
            return false;
        }
    }
}

class Libro1 extends MaterialBibioteca implements Prestable
{
    use Identificable;

    private $titulo;
    private $autor;
    private $anio;
    private $estaPrestado = false;

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function getAnio()
    {
        return $this->anio;
    }
    public function setAnio($anio)
    {
        $anioActual = date('Y');

        if ($anio < $anioActual) {
            $this->anio = $anio;
        } else {
            $this->anio = $anioActual;
            echo "Año incorrecto, se establece a {$anioActual} por defecto";
        }
    }

    public function __construct($titulo, $autor, $anio)
    {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setAnio($anio);
        $this->setId(random_int(0, 100000000));
    }

    public function mostrarInfo()
    {
        echo "{$this->getTitulo()} escrito por {$this->getAutor()} en el año {$this->getAnio()} con id {$this->getId()}\n";
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
        $this->setNumeroEdicion($numeroEdicion);
    }

    public function getNumeroEdicion()
    {
        return $this->numeroEdicion;
    }
    public function setNumeroEdicion($numeroEdicion)
    {
        $this->numeroEdicion = $numeroEdicion;
    }

    public function mostrarInfo()
    {
        echo "{$this->getTitulo()} escrito por {$this->getAutor()} en el año {$this->getAnio()} con id {$this->getId()}\nSu edicion es {$this->getNumeroEdicion()}\n";
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
