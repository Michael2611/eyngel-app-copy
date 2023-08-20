@extends('layouts.app')

@section('content')
    <div class="container-login">
        <img class="logo_card_auth mb-3" src="{{ asset('images/icons/icon-logo-40x40px.png') }}" alt="logo-eyngel">
        <div class="card shadow p-4">
            <h5 class="titulo-h5 text-center">Recuperar contraseña</h5>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
    
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Correo electronico') }}</label>
    
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-custom @error('email') is-invalid @enderror"
                                placeholder="Ingreso correo electronico con el que se registro" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="bn bn-secondary">
                                {{ __('Enviar enlace para restablecer') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
