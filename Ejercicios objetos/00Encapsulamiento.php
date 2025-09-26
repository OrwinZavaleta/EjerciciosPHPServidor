<?php

class Persona
{
    public $nombre;
    protected $edad;
    private $password;

    public function __construct($nombre, $edad, $password)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->password = $password;
    }

    public function getPasswrod()
    {
        return $this->password;
    }
    public function getEdad()
    {
        return $this->edad;
    }
}


$persona1 = new Persona("pepe", 18, 1234);

echo $persona1->nombre;
echo $persona1->getEdad();
echo $persona1->getPasswrod();
