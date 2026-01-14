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
                            <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-table" loading="lazy"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.decrease', $id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"> - </button>
                                    </form>

                                    <span class="mx-3">{{ $item['quantity'] }}</span>

                                    <form action="{{ route('cart.increase', $id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"> + </button>
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
        <form action="{{ route('cart.destroy') }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Vacear el carrito</button>
        </form>
    </div>
@endsection
