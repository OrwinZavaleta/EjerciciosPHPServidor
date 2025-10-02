<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>suba un archivo</h1>
    <form action="./06Formulario.php" method="post" enctype="multipart/form-data">

        <label for="archivo">Suba una imagen: </label>
        <input type="file" name="archivo" id="archivo">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>