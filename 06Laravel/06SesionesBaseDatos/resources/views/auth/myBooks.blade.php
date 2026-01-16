@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <h3 class="m-0 pb-3">Mis Pedidos</h3>
    <ul class="list-group pb-3">
        @foreach ($pedidos as $p)
            <li class="list-group-item d-flex justify-content-around align-items-center">
                
            </li>
        @endforeach
    </ul>
@endsection
