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
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success display-5"><i class="bi bi-stars me-2"></i>Nuestras Ofertas</h2>
            <p class="lead text-muted">Selecciona una fecha para ver el menú disponible</p>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <ul class="nav nav-pills nav-fill bg-white shadow-sm rounded-pill p-2" id="pills-tab" role="tablist">
                @foreach ($ofertas as $i => $oferta)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 py-2 fw-bold @if ($i == 0) active @endif"
                            id="pills-{{ $i }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $i }}"
                            type="button" role="tab" aria-controls="pills-{{ $i }}"
                            aria-selected="@if ($i == 0) true @else false @endif">
                            {{ \Carbon\Carbon::parse($oferta->date_delivery)->translatedFormat('l j \d\e F') }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
            @foreach ($ofertas as $i => $oferta)
                <div class="tab-pane fade @if ($i == 0) show active @endif"
                    id="pills-{{ $i }}" role="tabpanel" aria-labelledby="pills-{{ $i }}-tab"
                    tabindex="0">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 py-3">

                        @foreach ($oferta->productsOffer as $productOffer)
                            <x-card-product :product="$productOffer->product" :offer="$oferta" :productOfferId="$productOffer->id"></x-card-product>
                        @endforeach

                    </div>
                    @if($oferta->productsOffer->isEmpty())
                        <div class="text-center py-5">
                             <div class="display-1 text-muted opacity-25 mb-3"><i class="bi bi-emoji-frown"></i></div>
                             <h4 class="text-muted">No hay platos disponibles para esta fecha.</h4>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endsection
