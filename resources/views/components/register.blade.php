<div class="modal fade" id="registerUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row" id="form-user">
                    <div class="col-md-12">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="tiutlo-h3 fw-bold">Crea tu cuenta</h3>
                                <button type="button" class="btn-close" name="btn-close" id="btn-close"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
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
                                            name="u_apellido" placeholder="Apellido" value="{{ old('u_apellido') }}"
                                            required autocomplete="u_apellido" minlength="3" autofocus>
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
                                        <label for="password"
                                            class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>
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
                                        <label for="u_fecha_nacimiento"
                                            class="col-md-12 col-form-label">{{ __('Fecha de nacimiento') }}</label>
                                        <input type="date" class="form-custom" name="u_fecha_nacimiento" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="" id="u_sexo">
                                                <label for="u_sexo"
                                                    class="col-md-12 col-form-label">{{ __('Sexo') }}</label>
                                                <select class="form-custom" name="u_sexo" id="u_sexo"
                                                    onchange="getSelected(this)">
                                                    <option value="H">Hombre</option>
                                                    <option value="M">Mujer</option>
                                                    <option value="O">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" id="personalizado_sexo">
                                                <label for="u_sexo_p"
                                                    class="col-md-12 col-form-label">{{ __('Sexo') }}</label>
                                                <input type="text" name="u_sexo_p" id="u_sexo_p" class="form-custom">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <p class="small">
                                        <label for="aceptar_terminos">
                                            <input type="checkbox" id="aceptar_terminos" name="aceptar_terminos" required>
                                            Acepto los
                                            <a class="text-primary" href="{{URL::to('politicas-eyngel#terminos-y-condiciones')}}">Términos y condiciones</a>, la
                                            <a class="text-primary" href="{{URL::to('politicas-eyngel#politica-privacidad')}}">Política de privacidad</a>, la
                                            <a class="text-primary" href="{{URL::to('politicas-eyngel#politica-cookies')}}">Política de cookies</a> y demas que Eyngel incluya.
                                        </label>
                                    </p>
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
</div>
