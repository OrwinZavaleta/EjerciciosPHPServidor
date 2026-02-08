@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 gap-3">
            <div>
                @admin
                    <h2 class="fw-bold text-success mb-0">
                        <i class="bi bi-clipboard-data-fill me-2"></i>Historial de Reservas
                    </h2>
                @endadmin
                <p class="text-muted mt-1 mb-0">Visualiza todas las reservas realizadas por los usuarios.</p>
            </div>
        </div>

        @if ($offers->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5 bg-light">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-clipboard-x"></i>
                        </div>
                        <h3 class="fw-bold text-secondary">No hay Ofertas con reservas aún.</h3>
                        <p class="text-muted mb-0">El historial de pedidos está vacío por el momento.</p>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @foreach ($offers as $o)
                    @admin
                        <div class="col">
                            <a href="{{ route('admin.offers.show', $o->id) }}"
                                class="card h-100 border-0 shadow rounded-4 overflow-hidden hover-shadow transition-all text-decoration-none">
                                <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                                    <span
                                        class="text-success fs-5 mb-2 px-3 py-2 rounded-pill fw-bold">
                                        Reservas de la Oferta del
                                        {{ \Carbon\Carbon::parse($o->date_delivery)->translatedFormat('l, j \d\e F') }}
                                    </span>
                                </div>
                                <div class="card-body">

                                </div>
                            </a>
                        </div>
                    @endadmin
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
