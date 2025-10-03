<?php
echo "Se inicia la validacion\n====";

$PATH = "./uploads/";

if (!file_exists($PATH)) mkdir($PATH);

$extensionesPermitidas = ["jpg", "jpeg", "png", "gif"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivos"])) {

    foreach ($_FILES["archivos"]["name"] as $key => $value) {
        $nombreTmp = $_FILES["archivos"]["tmp_name"][$key];
        $nombre = $_FILES["archivos"]["name"][$key];
        $tamanyo = $_FILES["archivos"]["size"][$key];
        $error = $_FILES["archivos"]["error"][$key];

        $destino = "$PATH" . basename($nombre);
        $tipo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
        echo $tipo."====";

        if ($error === UPLOAD_ERR_OK) {
            if ($tamanyo < 1024 * 1024 && in_array($tipo, $extensionesPermitidas)) {
                if (move_uploaded_file($nombreTmp, $destino)) {
                    echo "archivo $key movido con exito\n====";
                } else {
                    echo "error al mover el archivo $key\n====";
                }
            } else {
                echo ("El archivo $key no es valido\n====");
            }
        } else {
            echo "error en la subida del archivo $key\n====";
        }
    }
} else {
    echo "no entro a nada\n====";
}
