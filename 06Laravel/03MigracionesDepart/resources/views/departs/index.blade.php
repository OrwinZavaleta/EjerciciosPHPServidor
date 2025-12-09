@extends('layout')

@section('content')
    <h1>Listado de departamentos</h1>
    <ul>
        @foreach ($departs as $d)
            <li>{{ $d->depart_no }} - {{ $d->dnombre }} - {{ $d->loc }} -
                <a href="{{ route('departs.edit', $d->depart_no) }}">Editar</a>
                <form action="{{ route('departs.destroy', $d->depart_no) }}" method="post" style="display: inline-block; ">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('departs.create') }}">Crear un departamento</a>
@endsection
