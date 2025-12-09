@extends('layout')

@section('content')
    <h1>Crear un departamentos</h1>
    <form action="{{ route('departs.store') }}" method="post">
        @csrf
        <label for="depart_no">Num Depart
            <input type="number" name="depart_no" id="depart_no" required>
        </label>
        <label for="dnombre">Nombre del Departamento
            <input type="text" name="dnombre" id="dnombre" required>
        </label>
        <label for="loc">Localizacion
            <input type="text" name="loc" id="loc" required>
        </label>
        <input type="submit" value="Crear">
    </form>
@endsection
