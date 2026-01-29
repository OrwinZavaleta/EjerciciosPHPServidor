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
            @foreach ($ofertas as $i => $oferta)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if ($i == 1) active @endif"
                        id="pills-{{ $i }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $i }}"
                        type="button" role="tab" aria-controls="pills-{{ $i }}"
                        aria-selected="@if ($i == 1) true @else false @endif">{{ \Carbon\Carbon::parse($oferta->date_delivery)->translatedFormat('j \d\e F') }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($ofertas as $i => $oferta)
                <div class="tab-pane fade @if ($i == 1) show active @endif"
                    id="pills-{{ $i }}" role="tabpanel" aria-labelledby="pills-{{ $i }}-tab"
                    tabindex="0">
                    <div class="row row-cols-1 row-cols-md-2 g-4 py-3">

                        @foreach ($oferta->productsOffer as $productOffer)
                            <x-card-product :product="$productOffer->product" :offer="$oferta" :productOfferId="$productOffer->id"></x-card-product>
                        @endforeach

                    </div>

                </div>
            @endforeach
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
