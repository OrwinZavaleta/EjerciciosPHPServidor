<?php

namespace Orwin\Model\Models;

class UserModel
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = __DIR__ . "/../../data/users.txt";
    }

    public function saveName($name)
    {
        $connection = fopen($this->filePath, "a");

        return fwrite($connection, "$name\n");
    }

    public function getNames()
    {
        /* $connection = false;
        $array = [];

        if (file_exists($this->filePath)) {
            $connection = fopen($this->filePath, "r");

            // Hago que devuelva un array
            while (($linea = fgets($connection)) !== false) {
                $array[] = $linea;
            }
        } else {
            fopen($this->filePath, "w");
        } */

        $array = file($this->filePath);

        return $array;
    }

    public function delName($id)
    {
        $allUsers = $this->getNames();

        array_splice($allUsers, $id, 1);

        $archivo = fopen($this->filePath, "w");

        foreach ($allUsers as $name) {
            fwrite($archivo, "$name");
        }
    }
}
