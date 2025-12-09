@extends('layout')

@section('content')
    <h1>Empresa</h1>
    <ul>
        <li><a href="{{ route('departs.index') }}">Departamentos</a></li>
        <li><a href="{{ route('emples.index') }}">Empleados</a></li>
    </ul>
@endsection
