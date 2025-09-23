<?php

$hora = intval(date('H'));

echo match (true) {
    ($hora < 12) => "Buenos Dias",
    ($hora < 20) => "Buenas Tardes",
    ($hora < 24) => "Buenas Noches"
};
