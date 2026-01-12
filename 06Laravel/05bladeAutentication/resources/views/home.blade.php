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
        <ul class="nav nav-pills justify-content-center py-3" id="products" role="tablist">
            {{-- <li class="nav-item px-3 fw-semibold">
                <a class="nav-link bg-success active" aria-current="page" href="#">Menús</a>
            </li>
            <li class="nav-item px-3 fw-semibold">
                <a class="nav-link text-success" href="#">Platos</a>
            </li> --}}
            <li class="nav-item px-3 fw-semibold" role="presentation">
                <button class="nav-link active" id="menus-pill" data-bs-toggle="pill" data-bs-target="#menus-pill-pane"
                    type="button" role="pill" aria-controls="menus-pill-pane" aria-selected="true">Menús</button>
            </li>
            <li class="nav-item px-3 fw-semibold" role="presentation">
                <button class="nav-link" id="platos-pill" data-bs-toggle="pill" data-bs-target="#platos-pill-pane"
                    type="button" role="pill" aria-controls="platos-pill-pane" aria-selected="false">Platos</button>
            </li>
        </ul>
        <div class="tab-content" id="productsContent">
            <div class="tab-pane fade show active" id="menus-pill-pane" role="tabpanel" aria-labelledby="menus-pill"
                tabindex="0">
                <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
                    @foreach ($menus as $m)
                        <x-card-product :product="$m" />
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="platos-pill-pane" role="tabpanel" aria-labelledby="platos-pill" tabindex="0">
                <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
                    @foreach ($dishes as $d)
                        <x-card-product :product="$d" />
                    @endforeach
                </div>
            </div>
        </div>



    </div>
@endsection
