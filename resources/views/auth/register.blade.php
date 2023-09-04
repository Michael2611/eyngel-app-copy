@extends('layouts.app')
@section('content')
    <div class="container-register">
        <div class="container">
            <div class="card shadow border-0 p-4">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid mx-auto" src="{{asset('images/register.webp')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="tiutlo-h3 fw-bold">¡Bienvenido a EYGENL!</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                @if (Session('mensaje'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ session('mensaje') }}</strong>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="u_nombre"
                                            class="col-md-12 col-form-label">{{ __('Nombre') }}</label>
                                        <input id="u_nombre" type="text"
                                            class="form-custom @error('u_nombre') is-invalid @enderror" name="u_nombre"
                                            placeholder="Nombre" value="{{ old('u_nombre') }}" required
                                            autocomplete="u_nombre" minlength="3" autofocus>
                                        @error('u_nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="u_apellido"
                                            class="col-md-12 col-form-label">{{ __('Apellido') }}</label>
                                        <input id="u_apellido" type="text"
                                            class="form-custom @error('u_apellido') is-invalid @enderror"
                                            name="u_apellido" placeholder="Apellido"
                                            value="{{ old('u_apellido') }}" required autocomplete="u_apellido"
                                            minlength="3" autofocus>
                                        @error('u_apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email"
                                            class="col-md-12 col-form-label">{{ __('Correo electronico') }}</label>
                                        <input id="email" type="email"
                                            class="form-custom @error('email') is-invalid @enderror"
                                            placeholder="Correo electronico" name="email" value="{{ old('email') }}"
                                            required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password"
                                            class="form-custom @error('password') is-invalid @enderror"
                                            placeholder="Ingrese contraseña..." name="password" required
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fecha-nacimiento"
                                            class="col-md-12 col-form-label">{{ __('Fecha de nacimiento') }}</label>
                                        <input type="date" class="form-custom" name="u_fecha_nacimiento" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sexo" class="col-md-12 col-form-label">{{ __('Sexo') }}</label>
                                        <select class="form-custom" name="u_sexo" id="u_sexo">
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <p class="small">Al hacer clic en <strong>"Registrarse"</strong>, aceptas nuestras <a href="#">Condiciones</a>, la
                                        <a href="#">Política de privacidad</a> y la <a href="#">Política de cookies</a>.</p>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="bn bn-primary">
                                            {{ __('Registrarse') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/_getCode.js') }}"></script>
@endsection
