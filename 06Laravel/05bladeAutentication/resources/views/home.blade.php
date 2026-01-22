@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <!-- Hero Section -->
    {{-- <div class="bg-success text-white py-5 shadow-sm">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-3">Sabor real en cada plato</h1>
                    <p class="lead mb-4">Descubre la mejor selección de ingredientes frescos y recetas tradicionales con un
                        toque moderno.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="#" class="btn btn-light btn-lg px-4 me-md-2 text-success fw-bold">Ver Menú</a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">Reservar Mesa</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Features Section -->
    <div class="container py-3">
        <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
            @forelse ($dishes as $d)
                <x-card-product :product="$d" :offers="$d->offers" />
            @empty
                <h2 class="text-center mx-auto">En este momento no hay platos disponibles, por favor regrese en unos días.
                </h2>
            @endforelse
        </div>
    </div>
@endsection
