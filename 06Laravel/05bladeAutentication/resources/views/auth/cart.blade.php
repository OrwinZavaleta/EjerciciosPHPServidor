@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container py-3">
        <h1>Carrito</h1>

        @empty($cart)
            El carrito esta vacio.
        @else
            @php $totalGeneral = 0; @endphp
            //TODO
        @endempty

        <div class="text-end pb-3 fs-4 fw-bold @if (count($cart) === 0) d-none @endif">
            Total: <span>{{ $precioTotal }}</span> €
        </div>
        <div class="d-flex gap-3 justify-content-end">
            <form action="{{ route('cart.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" @if (count($cart) === 0) disabled @endif>Vaciar el
                    carrito</button>
            </form>
            <form action="{{ route('cart.order') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success px-4"
                    @if (count($cart) === 0) disabled @endif>Reservar</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
