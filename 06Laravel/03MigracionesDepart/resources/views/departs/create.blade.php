@extends('layout')

@section('content')
    <h1>Crear un departamentos</h1>
    <form action="{{ route('departs.store') }}" method="post" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="depart_no">Num Depart</label>
            <input class="form-control" type="number" name="depart_no" id="depart_no" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="dnombre">Nombre del Departamento</label>
            <input class="form-control" type="text" maxlength="20" name="dnombre" id="dnombre" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="loc">Localizacion</label>
            <input class="form-control" type="text" maxlength="20" name="loc" id="loc" required>
        </div>

        <div class="col-md-12 mt-3">
            <input type="submit" class="btn btn-primary px-3" value="Crear">
        </div>
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <div class="alert alert-danger mt-3">{{ $err }}</div>
        @endforeach
    @endif
@endsection
