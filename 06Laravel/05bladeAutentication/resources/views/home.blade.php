@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <!-- Hero Section -->
    <div class="bg-success text-white py-5 mb-5 shadow-sm">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-3">Sabor real en cada plato</h1>
                    <p class="lead mb-4">Descubre la mejor selección de ingredientes frescos y recetas tradicionales con un toque moderno.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="#" class="btn btn-light btn-lg px-4 me-md-2 text-success fw-bold">Ver Menú</a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">Reservar Mesa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mb-5">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 bg-white shadow-sm p-4">
                    <div class="display-5 text-success mb-3">🥗</div>
                    <h4 class="fw-bold">Ingredientes Frescos</h4>
                    <p class="text-muted">Directamente de productores locales para garantizar la máxima calidad.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 bg-white shadow-sm p-4">
                    <div class="display-5 text-success mb-3">👨‍🍳</div>
                    <h4 class="fw-bold">Chef Profesional</h4>
                    <p class="text-muted">Pasión y experiencia en cada receta preparada al momento.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 bg-white shadow-sm p-4">
                    <div class="display-5 text-success mb-3">🛵</div>
                    <h4 class="fw-bold">Envío Rápido</h4>
                    <p class="text-muted">Recibe tu comida caliente y lista para disfrutar en tiempo récord.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container mb-5">
        <div class="bg-white p-5 rounded-4 shadow-sm text-center border border-success border-opacity-10">
            <h2 class="fw-bold text-success mb-3">¿Hambre?</h2>
            <p class="text-muted mb-4">Regístrate ahora y obtén un 10% de descuento en tu primer pedido online.</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5 shadow-sm">Crear cuenta</a>
            @else
                <a href="#" class="btn btn-success btn-lg px-5 shadow-sm">Pedir Ahora</a>
            @endguest
        </div>
    </div>
@endsection
