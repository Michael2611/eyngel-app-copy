@laravelPWA
@extends('layouts.app')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{ asset('js/pwa-install.js') }}"></script>
<div class="popup" style="display: flex; position: absolute; top: 90px; right: 20px; flex-direction: column; justify-content: flex-start; align-items: center; padding: 20px; text-align: center;">
    <button id="close-button" style="position: absolute; top: 5px; right: 5px; background-color: transparent; color: #555; border: none; padding: 5px; cursor: pointer;">X</button>
    <p style="margin-bottom: 1px;">¡Instala nuestra APP para disfrutar de una mejor experiencia!</p>
    <button id="install-button" style="background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 15px 25px; cursor: pointer;">Instalar</button>
</div>

<div id="ios-popup" class="popup" style="display: position: absolute; top: 190px; right: 20px; flex-direction: column; justify-content: flex-start; align-items: center; padding: 20px; text-align: center;">
    <p style="margin-bottom: 10px;">¡Instala nuestra APP para disfrutar de una mejor experiencia en iOS!</p>
    <p>1. Pulsa el botón "Compartir" en la parte inferior de la pantalla.</p>
    <p>2. Selecciona "Agregar a la pantalla de inicio".</p>
    <p>3. Sigue las instrucciones para añadir la app a tu pantalla de inicio.</p>
    <button id="ios-close-button" style="position: absolute; top: 5px; right: 5px; background-color: transparent; color: #555; border: none; padding: 5px; cursor: pointer;">X</button>
</div>

    <div class="container-login">
        <img class="logo_card_auth" src="{{ asset('images/icons/icon-logo-200.png') }}" alt="">
        <div class=" border-0 p-2">
            <div class="card-body">
                <form method="POST" action="{{route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Correo electronico') }}</label>
                            <div class="col-md-12">
                                <input id="email-login" type="email"
                                    class="form-custom @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Ingrese correo electronico...." required
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>
                            <div class="row">
                                <div class="col-md-12" style="position: relative;">
                                    <input id="password-login" type="password"
                                        class="form-custom @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password" placeholder="Ingrese contraseña....">
                                    <a class="btn mt-2" id="button-show-pass" onclick="showPassword()"><i class="bi bi-eye"></i></a>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember" style="font-size: 108%; font-weight: bold;">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="bn bn-primary">
                                {{ __('Ingresar') }}
                            </button>
                            <hr>
                            <div class="d- mt-4">
                                <a class="text-default" style="text-decoration: none; color: #000" id="text__pass"
                                    href="{{ route('password.update') }}">Recuperar
                                    contraseña</a>
                                <a class="text-default" href="#" style="text-decoration: none; color: #000"
                                    id="text__pass" data-bs-toggle="modal" data-bs-target="#registerUser">Registro de nuevo
                                    usuario</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="footer d-flex gap-3 justify-content-center align-items-center" style="width: 100%; left: 0%;position: fixed; bottom: 30px;">
                <a class="fw-bold" href="{{URL::to('politicas-eyngel#terminos-y-condiciones')}}">Terminos y condiciones</a>
            </div>
        </div>
    </div>
@endsection
@include('components.register')
