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

    public function getName($id)
    {
        return $this->getNames()[$id];
    }

    public function updateName($id, $newName)
    {
        $id = intval($id);
        $allUsers = $this->getNames();

        $allUsers[$id] = $newName . "\n";

        $this->overrideUsers($allUsers);
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
        $id = intval($id);
        $allUsers = $this->getNames();

        array_splice($allUsers, $id, 1);
        // print_r($name);

        $this->overrideUsers($allUsers);
    }

    private function overrideUsers($array)
    {
        $archivo = fopen($this->filePath, "w");

        foreach ($array as $name) {
            fwrite($archivo, "$name");
        }
    }
}
