@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
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
                            <p class="text-muted mb-4">¡Parece que aún no has elegido tu comida de hoy!</p>
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow-sm">
                                <i class="bi bi-search me-2"></i>Ver Ofertas
                            </a>
                        </div>
                    </div>
                @else
                    @php $totalGeneral = 0; @endphp
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-0">
                            <!-- //TODO -->
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 bg-success bg-opacity-10 mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <span class="fs-4 fw-medium text-success">Total a pagar:</span>
                            <span class="display-6 fw-bold text-success">{{ $precioTotal }}€</span>
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
