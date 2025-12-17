 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-buildings-fill"></i>
            GestiónEmp
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('departs.index') }}"
                        class="nav-link {{ request()->routeIs('departs.*') ? 'active' : '' }}">Departamentos</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ route('emples.index') }}"
                            class="nav-link {{ request()->routeIs('emples.*') ? 'active' : '' }}">Empleados</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i> Log in
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                            <i class="bi bi-person-plus-fill"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
