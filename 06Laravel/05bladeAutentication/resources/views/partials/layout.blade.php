<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5.3.8 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/img/gregorioprieto.png" type="image/x-icon">
    <title>@yield('title', 'Prieto Eats')</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <header>
        @include('partials.header')
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="mt-auto">
        @include('partials.footer')
    </footer>

    <!-- Bootstrap 5.3.8 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <!-- Aquí se inyectarán los scripts específicos de cada vista --> @stack('scripts')
</body>

</html>
