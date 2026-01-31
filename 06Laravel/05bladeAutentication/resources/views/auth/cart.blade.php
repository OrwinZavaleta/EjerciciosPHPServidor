@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                    <h2 class="fw-bold text-success mb-0"><i class="bi bi-cart3 me-2"></i>Tu Carrito</h2>
                    @if (!empty($cart))
                        <span class="badge bg-success ms-3 rounded-pill">{{ count($cart, COUNT_RECURSIVE) - count($cart) }} productos</span>
                    @endif
                </div>

                @empty($cart)
                    <div class="card border-0 shadow-sm rounded-4 py-5 bg-light text-center">
                        <div class="card-body">
                            <div class="display-1 text-success opacity-25 mb-4">
                                <i class="bi bi-basket2"></i>
                            </div>
                            <h3 class="fw-bold text-secondary">Tu carrito está vacío</h3>
                            <p class="text-muted mb-4">¡Parece que aún no has elegido tu comida de hoy!</p>
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow-sm">
                                <i class="bi bi-search me-2"></i>Ver Ofertas
                            </a>
                        </div>
                    </div>
                @else
                    @php $totalGeneral = 0; @endphp

                    <div class="row g-4">
                        <div class="col-lg-8">
                            @foreach ($cart as $offerId => $items)
                                @php
                                    $offer = $offersById["$offerId"] ?? null;
                                @endphp
                                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                                    <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                                        <div class="d-flex align-items-center text-success">
                                            <i class="bi bi-calendar-event me-2 fs-5"></i>
                                            <div>
                                                <h5 class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($offer->date_delivery)->translatedFormat('l j \d\e F') }}</h5>
                                                <small class="text-muted fw-semibold">Entrega: {{ $offer->time_delivery }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        @foreach ($items as $productOfferId => $quantity)
                                            @php
                                                $po = $productOffersById[$productOfferId] ?? null;
                                                $producto = $po->product;
                                                $lineaTot = $producto->price * (int) $quantity;
                                                $totalGeneral += $lineaTot;
                                            @endphp

                                            <div class="list-group-item p-3 border-light">
                                                <div class="row align-items-center g-3">
                                                    {{-- Imagen --}}
                                                    <div class="col-3 col-md-2">
                                                        <img src="{{ asset('storage/' . ($producto->image ?? 'img/unknown-dish.png')) }}"
                                                             alt="{{ $producto->name }}" 
                                                             class="img-fluid rounded-3 shadow-sm object-fit-cover" 
                                                             style="aspect-ratio: 1/1; width: 100%;">
                                                    </div>
                                                    
                                                    {{-- Info Producto --}}
                                                    <div class="col-9 col-md-4">
                                                        <h6 class="fw-bold mb-1 text-dark">{{ $producto->name }}</h6>
                                                        <p class="text-muted small mb-0">{{ number_format($producto->price, 2) }} € / ud</p>
                                                    </div>

                                                    {{-- Cantidad --}}
                                                    <div class="col-6 col-md-3 d-flex justify-content-start justify-content-md-center align-items-center">
                                                            <form action="{{ route('cart.decrease', ['i' => $offerId, 'j' => $productOfferId]) }}" method="post" style="display: contents">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-outline-secondary" type="submit" @if ($quantity <= 1) disabled @endif>
                                                                    <i class="bi bi-dash"></i>
                                                                </button>
                                                            </form>
                                                            <span class="px-3 text-center border-secondary bg-white">{{ $quantity }}</span>
                                                            <form action="{{ route('cart.increase', ['i' => $offerId, 'j' => $productOfferId]) }}" method="post" style="display: contents">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-outline-secondary" type="submit">
                                                                    <i class="bi bi-plus"></i>
                                                                </button>
                                                            </form>
                                                    </div>

                                                    {{-- Subtotal --}}
                                                    <div class="col-4 col-md-2 text-end">
                                                        <span class="fw-bold text-success fs-5">{{ number_format($lineaTot, 2) }}€</span>
                                                    </div>

                                                    {{-- Borrar --}}
                                                    <div class="col-2 col-md-1 text-end">
                                                        <form action="{{ route('cart.delete', ['i' => $offerId, 'j' => $productOfferId]) }}" method="post" class="form-delete" data-confirm-message="¿Quieres eliminar este producto del carrito?">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger p-0 fs-5" title="Eliminar del carrito">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Resumen lateral --}}
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4 bg-white sticky-top" style="top: 2rem; z-index: 100;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">Resumen</h4>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Subtotal</span>
                                        <span class="fw-semibold">{{ number_format($totalGeneral, 2) }} €</span>
                                    </div>
                                    
                                    <hr class="my-3 border-light">

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="fs-5 fw-bold text-dark">Total</span>
                                        <span class="fs-3 fw-bold text-success">{{ number_format($totalGeneral, 2) }} €</span>
                                    </div>

                                    <form action="{{ route('cart.order') }}" method="post" class="d-grid mb-3">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-lg rounded-pill fw-bold shadow-sm"
                                            @if (count($cart) === 0) disabled @endif>
                                            Confirmar Pedido
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.destroy') }}" method="post" class="text-center form-delete" data-confirm-title="¿Vaciar Carrito?" data-confirm-message="Se eliminarán todos los productos de tu pedido." data-confirm-btn="Si, vaciar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger text-decoration-none small"
                                            @if (count($cart) === 0) disabled @endif>
                                            <i class="bi bi-trash3 me-1"></i> Vaciar todo el carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
