<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenido {{ $nombre ?? 'anonimus' }}</h1>
    <h2>Esto es un archivo estatico desde el router</h2>
    <h2>Esta e una vista renderizada</h2>

    <p>{{ $contenido }}</p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, tenetur culpa cupiditate quam, placeat
        consequuntur blanditiis autem nobis fugit aut recusandae. Ipsum, voluptas excepturi fugiat omnis velit
        necessitatibus architecto magnam.</p>
</body>

</html>
