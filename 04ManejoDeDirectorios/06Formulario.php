<?php
echo "Se inicia la validacion\n";

$PATH = "./uploads/";

if (!file_exists($PATH)) mkdir($PATH);

$extensionesPermitidas = ["jpg", "jpeg", "png", "gif"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $nombreTmp = $_FILES["archivo"]["tmp_name"];
    $nombre = $_FILES["archivo"]["name"];
    $tamanyo = $_FILES["archivo"]["size"];
    $error = $_FILES["archivo"]["error"];

    $destino = "$PATH" . basename($nombre);
    $tipo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
    echo $tipo;

    if ($error === UPLOAD_ERR_OK) {
        if ($tamanyo < 1024 * 1024 && in_array($tipo, $extensionesPermitidas)) {
            if (move_uploaded_file($nombreTmp, $destino)) {
                echo "archivo movido con exito\n";
            } else {
                echo "error al mover el archivo\n";
            }
        } else {
            die("El archivo no es valido\n");
        }
    } else {
        echo "error en la subida\n";
    }
} else {
    echo "no entro a nada\n";
}
