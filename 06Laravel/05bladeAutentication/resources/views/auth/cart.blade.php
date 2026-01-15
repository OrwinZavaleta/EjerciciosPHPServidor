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
                    @forelse ($cart as $id => $item)
                        <tr>
                            <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-table" loading="lazy">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.decrease', $id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            @if ($item['quantity'] === 1) disabled @endif> - </button>
                                    </form>

                                    <span class="mx-3">{{ $item['quantity'] }}</span>

                                    <form action="{{ route('cart.increase', $id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            @if ($item['quantity'] === 5) disabled @endif> + </button>
                                    </form>
                            </td>
                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['price'] * $item['quantity'] }}</td>
                            <td>
                                <form action="{{ route('cart.delete', $id) }}" method="post">
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
        {{-- TODO: desabilitar cuando no hay productos --}}
        <div class="d-flex gap-3">
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
