@extends('layout')

@section('content')
    <h1>Crear un departamentos</h1>
    <form action="{{ route('departs.update', $depart->depart_no) }}" method="post">
        @csrf
        @method('PUT')
        <label for="depart_no">Num Depart
            <input type="number" name="depart_no" id="depart_no" value="{{ $depart->depart_no }}" disabled>
        </label>
        <label for="dnombre">Nombre del Departamento
            <input type="text" name="dnombre" id="dnombre" value="{{ $depart->dnombre }}" required>
        </label>
        <label for="loc">Localizacion
            <input type="text" name="loc" id="loc" value="{{ $depart->loc }}" required>
        </label>
        <input type="submit" value="Crear">
    </form>
@endsection
