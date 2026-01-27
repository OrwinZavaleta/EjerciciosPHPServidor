@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success mb-1">
                    @admin
                        <i class="bi bi-journal-text me-2"></i>
                        Todas las Ofertas
                    @endadmin
                </h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.offers.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg me-2"></i>
                    Crear nueva oferta
                </a>
            </div>
        </div>

        @if ($offers->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h4 class="fw-bold">No hay Ofertas</h4>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($offers as $o)
                    @admin
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <!-- Cabecera de la Reserva -->
                                <div class="card-body">
                                    <h5 class="card-title fs-2">Reserva del
                                        {{ \Carbon\Carbon::parse($o->date_delivery)->translatedFormat('j \d\e F') }}
                                    </h5>

                                    @foreach ($o->productsOffer as $po)
                                        {{-- <img src="{{ assets('storage/' . $po->product->image) }}" class="card-img-top"
                                        alt="{{ $po->product->name }}"> --}}
                                        <h5 class="card-title">{{ $po->product->name }}</h5>
                                        <p class="card-text">{{ $po->product->description }}</p>
                                    @endforeach

                                    <form action="{{ route('admin.offers.destroy', $o->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash me-2"></i>Eliminar</button>
                                    </form>
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
