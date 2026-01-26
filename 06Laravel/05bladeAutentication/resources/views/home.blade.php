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
        <h2 class="fw-bold text-success py-2"><i class="bi bi-cup-hot-fill me-2"></i>Ofertas Disponibles</h2>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                    type="button" role="tab" aria-controls="pills-disabled" aria-selected="false"
                    disabled>Disabled</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">...</div>
        </div>

        {{-- <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
            @forelse ($ofertas as $o)
                <x-card-product :product="$o->productsOffer->product" :offer="$o" />
            @empty
                <h2 class="text-center mx-auto">En este momento no hay platos disponibles, por favor regrese en unos días.
                </h2>
            @endforelse
        </div> --}}
    </div>
@endsection
