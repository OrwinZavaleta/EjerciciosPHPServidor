@props(['product'])

<div class="col">
    <div class="card shadow-sm">
        <img src="{{ $product->image ?? '/img/unknown-dish.png' }}" class="card-img-top img-16-9" alt="{{ $product->name }}" loading="lazy">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            @auth
                <form action="{{ route("cart.add", $product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Añadir al carrito</button>
                </form>
            @else
                <p class="m-0 text-danger">Inicie sesión</p>
            @endauth
        </div>
    </div>
</div>
