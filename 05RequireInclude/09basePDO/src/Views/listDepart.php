<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despartamentos</title>
</head>

<body>
    <h2>Listado de departamentos</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>dnombre</th>
                <th>loc</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departamentos as $a): ?>
                <tr>
                    <td><?= $a["depart_no"] ?></td>
                    <td><?= $a["dnombre"] ?></td>
                    <td><?= $a["loc"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/">Regresar al home</a>
</body>

</html>