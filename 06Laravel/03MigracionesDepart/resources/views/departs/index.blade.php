@extends('layout')

@section('content')
    <h1>Listado de departamentos</h1>
    <ul class="list-group">
        @foreach ($departs as $d)
            <li class="list-group-item">{{ $d->depart_no }} - {{ $d->dnombre }} - {{ $d->loc }} -
                <a href="{{ route('departs.edit', $d->depart_no) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('departs.destroy', $d->depart_no) }}" method="post" style="display: inline-block; ">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Borrar" class="btn btn-danger">
                </form>
            </li>
        @endforeach
    </ul>
    @if (session('error'))
        <br>
        <div class="alert alert-danger">
            {{ session('error') }}</div>
    @elseif (session('success'))
        <br>
        <div class="alert alert-success">
            {{ session('success') }}</div>
    @endif
    <a class="btn btn-primary mt-3" href="{{ route('departs.create') }}">Crear un departamento</a>
@endsection
