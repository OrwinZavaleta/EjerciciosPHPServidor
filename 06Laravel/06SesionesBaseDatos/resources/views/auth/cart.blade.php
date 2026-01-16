@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container py-3">
        <h1>Carrito</h1>
        <div class="table-responsive">
            <table class="table table-transparente">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio unitario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $precioTotal = 0;
                    @endphp
                    @forelse ($cart as $c)
                        <tr>
                            <td><img src="{{ $c->product->image ?? '/img/unknown-dish.png' }}" alt="{{ $c->product->name }}"
                                    class="img-table" loading="lazy">
                            </td>
                            <td>{{ $c->product->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.decrease', $c->product->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            @if ($c->quantity === 1) disabled @endif> - </button>
                                    </form>

                                    <span class="mx-3">{{ $c->quantity }}</span>

                                    <form action="{{ route('cart.increase', $c->product->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            @if ($c->quantity === 5) disabled @endif> + </button>
                                    </form>
                            </td>
                            <td>{{ $c->product->price }}</td>
                            @php
                                $precioTotal += $c->product->price * $c->quantity;
                            @endphp
                            <td>{{ $c->product->price * $c->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.delete', $c->product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-black text-opacity-50">No hay productos en el carrito
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
