@extends('partials.layout')

@section('title', 'Bienvenido a Prieto Eats')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" required>
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
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label for="remember_me" class="form-check-label">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Logearse</button>
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
