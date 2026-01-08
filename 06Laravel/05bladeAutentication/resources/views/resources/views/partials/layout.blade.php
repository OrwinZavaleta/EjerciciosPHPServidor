<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'Prieto Eats')</title>
    <style>
        :root {
            --prieto-green: #2E7D32;
            --prieto-green-light: #43A047;
            --prieto-bg: #F1F8E9;
            --prieto-white: #ffffff;
        }

        body {
            background-color: var(--prieto-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .bg-prieto {
            background-color: var(--prieto-green) !important;
        }

        .text-prieto {
            color: var(--prieto-green) !important;
        }

        .btn-prieto {
            background-color: var(--prieto-green);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-prieto:hover {
            background-color: var(--prieto-green-light);
            color: white;
            transform: translateY(-2px);
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #b2dfdb !important;
        }

        footer {
            background-color: #1b5e20;
            color: white;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        @include('partials.header')
    </header>
    <main class="flex-grow-1">
        @yield('content')
    </main>
    <footer class="mt-auto py-4">
        @include('partials.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
