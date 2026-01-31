@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                    <h2 class="fw-bold text-success mb-0"><i class="bi bi-cart3 me-2"></i>Tu Carrito</h2>
                </div>

                @empty($cart)
                    <div class="card border-0 shadow-sm rounded-4 py-5 bg-light text-center">
                        <div class="card-body">
                            <div class="display-1 text-success opacity-25 mb-4">
                                <i class="bi bi-basket2"></i>
                            </div>
                            <h3 class="fw-bold text-secondary">Tu carrito está vacío</h3>
                            {{-- <p class="text-muted mb-4">¡Parece que aún no has elegido tu comida de hoy!</p> --}}
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow-sm">
                                <i class="bi bi-search me-2"></i>Ver Ofertas
                            </a>
                        </div>
                    </div>
                @else
                    @php $totalGeneral = 0; @endphp

                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach ($cart as $offerId => $items)
                                    @php
                                        $offer = $offersById["$offerId"] ?? null;
                                        $subtotal = 0;
                                    @endphp
                                    <div class="card list-group-item p-0">
                                        <div class="card-header">
                                            <strong>Oferta: </strong>
                                            {{ \Carbon\Carbon::parse($offer->date_delivery)->translatedFormat('l j \d\e F') }}
                                            <small class="text-muted">{{ $offer->time_delivery }}</small>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($items as $productOfferId => $quantity)
                                                @php
                                                    $po = $productOffersById[$productOfferId] ?? null;
                                                    $producto = $po->product;
                                                    $lineaTot = $producto->price * (int) $quantity;
                                                    $subtotal += $lineaTot;
                                                    $totalGeneral += $lineaTot;
                                                @endphp

                                                <div class="row  pb-2">
                                                    <div class="col"><img
                                                            src="{{ asset('storage/' . ($producto->image ?? 'img/unknown-dish.png')) }}"
                                                            alt="{{ $producto->name }}" class="w-100 rounded-3"></div>
                                                    <div class="col">{{ $producto->name }}</div>
                                                    <div class="col">{{ number_format($producto->price, 2) }} €</div>
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('cart.decrease', ['i' => $offerId, 'j' => $productOfferId]) }}"
                                                            class="d-inline-block" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="rounded-5 btn btn-secondary px-1 py-0 mx-1"
                                                                @if ($quantity <= 1) disabled @endif> - </button>
                                                        </form>
                                                        {{ $quantity }}
                                                        <form
                                                            action="{{ route('cart.increase', ['i' => $offerId, 'j' => $productOfferId]) }}"
                                                            class="d-inline-block" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="rounded-5 btn btn-secondary px-1 py-0 mx-1"> + </button>
                                                        </form>
                                                    </div>
                                                    <div class="col">{{ number_format($lineaTot, 2) }}€</div>
                                                    <div class="col">
                                                        <form
                                                            action="{{ route("cart.delete", ['i' => $offerId, 'j' => $productOfferId]) }}"
                                                            class="d-inline-block" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="rounded-5 btn btn-danger"> Borrar </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 bg-success bg-opacity-10 mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <span class="fs-4 fw-medium text-success">Total a pagar:</span>
                            <span class="display-6 fw-bold text-success">{{ $totalGeneral }}€</span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <form action="{{ route('cart.destroy') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-lg rounded-pill fw-bold"
                                @if (count($cart) === 0) disabled @endif>
                                <i class="bi bi-trash3 me-2"></i>Vaciar Carrito
                            </button>
                        </form>
                        <form action="{{ route('cart.order') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill fw-bold shadow-sm"
                                @if (count($cart) === 0) disabled @endif>
                                <i class="bi bi-check-lg me-2"></i>Confirmar Reserva
                            </button>
                        </form>
                    </div>
                @endempty
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
