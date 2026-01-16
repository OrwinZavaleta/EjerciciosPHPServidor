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
        @session('success')
            <div class="container">
                <div class="alert alert-success my-3 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endsession
        @session('error')
            <div class="container">
                <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endsession
        @session('info')
            <div class="container">
                <div class="alert alert-info my-3 alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endsession
        </div>
        @yield('content')
    </main>

    <footer class="mt-auto">
        @include('partials.footer')
    </footer>

    <!-- Bootstrap 5.3.8 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <!-- Aquí se inyectarán los scripts específicos de cada vista -->
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const alert = document.querySelector(".alert");
            if (alert) {
                setTimeout(() => {
                    const alert = bootstrap.Alert.getOrCreateInstance('.alert');
                    alert.close();
                }, 3000);
            }
        });
    </script>
</body>

</html>
