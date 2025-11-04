<?php

namespace App\Models;


class Model
{
    private $data;

    public function __construct()
    {
        $datos = file_get_contents(__DIR__ . "/../../data/HeroesYVillanos.json");
        $this->data = json_decode($datos, true);
    }

    public function all()
    {
        return $this->data;
    }
}
