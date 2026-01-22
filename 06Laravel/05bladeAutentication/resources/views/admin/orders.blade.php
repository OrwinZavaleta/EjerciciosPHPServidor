@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success mb-1">
                    <i class="bi bi-journal-text me-2"></i>
                    @admin
                        Todas las Reservas
                    @endadmin
                </h2>
            </div>
        </div>

        @if ($orders->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h4 class="fw-bold">No hay reservas</h4>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row">
                @foreach ($orders as $o)
                    @admin
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <!-- Cabecera de la Reserva -->
                                <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <span
                                                class="badge bg-success bg-opacity-10 text-success mb-2 px-3 py-2 rounded-pill small fw-bold">
                                                Reserva #{{ $o->id }}
                                            </span>
                                            <div class="text-muted small mt-1">
                                                <i class="bi bi-calendar-check me-1"></i>
                                                {{ $o->created_at->format('d/m/Y H:i') }}
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-muted small d-block">Total</span>
                                            <span class="fw-bold fs-4 text-success">{{ number_format($o->total, 2) }}€</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cuerpo: Listado de platos -->
                                <div class="card-body px-4 pt-2">
                                    <h6 class="fw-bold mb-3 text-uppercase small ls-wide text-muted border-bottom pb-2">
                                        <i class="bi bi-list-stars me-2"></i>Detalle del Pedido
                                    </h6>
                                    <div class="order-items-container">
                                        @php $totalPlatos = 0; @endphp
                                        @foreach ($o->order_items as $item)
                                            @php $totalPlatos += $item->quantity; @endphp
                                            <div
                                                class="d-flex justify-content-between align-items-center mb-2 p-2 rounded-3 bg-light bg-opacity-50">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2 quantity-circle">
                                                        {{ $item->quantity }}
                                                    </div>
                                                    <span class="small fw-medium text-dark">{{ $item->product->name }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Footer: Resumen -->
                                <div class="card-footer bg-light border-0 px-4 py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted small">Cantidad total</span>
                                        <span
                                            class="badge bg-white text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-bold shadow-sm">
                                            {{ $totalPlatos }} {{ $totalPlatos == 1 ? 'plato' : 'platos' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endadmin
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
