@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Nombre</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                <div class="invalid-feedback">
                    Ingresa un Nombre valido.
                </div>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                <div class="invalid-feedback">
                    Ingresa un email valido.
                </div>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" value="{{ old('password') }}" required>
                <div class="invalid-feedback">
                    Ingresa una contraseña valida.
                </div>
            </div>
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    required>
                <div class="invalid-feedback">
                    Ingresa una contraseña valida.
                </div>
            </div>
            <div class="col-12">
                <a href="{{ route('login') }}"">Already registered?</a>
                <button class="btn btn-primary" type="submit">Registrarse</button>
            </div>
        </form>
    </div>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
