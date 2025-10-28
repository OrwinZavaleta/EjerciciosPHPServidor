<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    <h2>Listado de departamentos</h2>
    <ul>
        <?php foreach ($departamentos as $a): ?>
            <li><?= $a["dnombre"] ?> ->> <?= $a["loc"] ?> <a href="/updateDepartForm?depart_no=<?=$a["_id"]?>">Editar</a> - <a href="/delDepart?depart_no=<?=$a["_id"]?>">Eliminar</a>
         </li>
        <?php endforeach; ?>
    </ul>

    <a href="/createDepartForm">Crear nuevo departamento</a>
<!-- </body>
</html> -->