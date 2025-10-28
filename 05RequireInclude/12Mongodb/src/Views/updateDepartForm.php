<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Ingrese el nuevo departamento</h2>
    <form action="/updateDepart" method="post">
        <label for="depart_no">Numero de departamento</label>
        <input type="text" name="depart_no" id="depart_no" value="<?= $dep["depart_no"]?>">
        <label for="dnombre">Nombre de Departamento</label>
        <input type="text" name="dnombre" id="dnombre" value="<?= $dep["dnombre"]?>">
        <label for="loc">Ubicacion</label>
        <input type="text" name="loc" id="loc" value="<?= $dep["loc"]?>">

        <input type="hidden" name="_id" value="<?= $dep["_id"]?>">

        <input type="submit" value="Actualizar">
    </form>
</body>

</html>