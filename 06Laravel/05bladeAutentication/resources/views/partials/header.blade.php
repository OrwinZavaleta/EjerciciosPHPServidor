<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-3" href="/">
            <img src="/img/gregorioprieto.png" alt="Logo" class="d-inline-block align-text-top nav-icon">
            <span class="text-white fs-4">Prieto<span class="ms-2 badge bg-white text-success">Eats</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contacto</a>
                </li>
                @auth
                    <li class="nav-item ms-lg-3">
                        <span class="nav-link text-white-50">Hola, {{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-lg-2"><i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light btn-sm px-3 text-success fw-bold"
                            href="{{ route('register') }}"><i class="bi bi-person-plus me-2"></i>Regístrate</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
