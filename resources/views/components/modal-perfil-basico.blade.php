@if (Auth::check())
<div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="tiutlo-h5 fw-bold">Actualiza tu información</h5>
                        <form method="POST" action="{{URL::to('/'.Auth::user()->u_nombre_usuario.'/update-profile')}}">
                            @csrf
                            @method('PUT')
                            @if (Session('mensaje'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('mensaje') }}</strong>
                                </div>
                            @endif
                            <?php $idEncriptado = Crypt::encrypt($usuario->id); ?>
                            <input type="hidden" name="id" id="id" value="{{$idEncriptado}}" required>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="u_nombre"
                                        class="col-md-12 col-form-label">{{ __('Nombre') }}</label>
                                    <input id="u_nombre" type="text"
                                        class="form-custom @error('u_nombre') is-invalid @enderror"
                                        name="u_nombre" placeholder="Nombre"
                                        value="{{ $usuario->u_nombre }}" required
                                        autocomplete="u_nombre" minlength="5" autofocus>
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
                                        value="{{ $usuario->u_apellido }}" required
                                        autocomplete="u_apellido" minlength="5" autofocus>
                                    @error('u_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="u_nombre_usuario"
                                        class="col-md-12 col-form-label">{{ __('Usuario') }}</label>
                                    <input type="text" class="form-custom" name="u_nombre_usuario"
                                        value="{{ $usuario->u_nombre_usuario }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha-nacimiento"
                                        class="col-md-12 col-form-label">{{ __('Fecha de nacimiento') }}</label>
                                    <input type="date" class="form-custom" name="u_fecha_nacimiento"
                                        value="{{ $usuario->u_fecha_nacimiento }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="descripcion_perfil"
                                        class="col-md-12 col-form-label">{{ __('Descripción perfil') }}</label>
                                    <textarea class="form-custom" cols="30" rows="5" name="pu_descripcion" id="pu_descripcion" required
                                        placeholder="Escribe algo..." maxlength="250">{{ $usuario->u_descripcion_perfil }}</textarea>
                                    <p class="mt-2" style="font-size: 14px" id="count"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sexo" class="col-md-12 col-form-label">{{ __('Sexo') }}</label>
                                    <select class="form-custom" name="u_sexo" id="u_sexo">
                                        <option value="H" {{ $usuario->u_sexo == 'H' ? 'selected' : '' }}>Hombre
                                        </option>
                                        <option value="M">Mujer</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ciudad" class="col-md-12 col-form-label">{{ __('Ciudad') }}</label>
                                    <input type="text" class="form-custom" name="u_ciudad_residencia"
                                        id="u_ciudad_residencia" value="{{ $usuario->u_ciudad_residencia }}" required
                                        placeholder="Ciudad de residencia">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="bn bn-primary">
                                        {{ __('Actualizar datos') }}
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
<script>
    const pu_descripcion = document.getElementById('pu_descripcion');
    const count = document.getElementById('count');

    // Obtener la cantidad máxima de caracteres permitidos del atributo "maxlength" del textarea
    const maxLength = pu_descripcion.getAttribute('maxlength');

    // Escuchar el evento 'input' del textarea
    pu_descripcion.addEventListener('input', function() {
        // Obtener la longitud actual del texto en el textarea
        const currentLength = pu_descripcion.value.length;

        // Actualizar el contador de caracteres
        count.textContent = `Caracteres: ${currentLength}/${maxLength}`;
    });
</script>

@endif