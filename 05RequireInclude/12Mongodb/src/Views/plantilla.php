<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <?php require __DIR__ . "/../Views/header.php" ?>
    </header>
    <main>
        <?php require $contenido ?>
    </main>
    <footer>
        <?php require __DIR__ . "/../Views/footer.php" ?>
    </footer>
</body>

</html>