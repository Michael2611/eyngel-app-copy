@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row" id="content-settings">
            <div class="col-md-4 mt-4">
                <div class="card p-3 border-0 shadow-sm">
                    @include('components.menu-settings')
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">Datos básicos</div>
                    <form class="card-body" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="u_nombre">Nombre</label>
                                    <input class="form-custom" type="text" name="u_nombre" id="u_nombre" value="{{Auth::user()->u_nombre}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="u_apellido">Apellido</label>
                                    <input class="form-custom" type="text" name="u_apellido" id="u_apellido" value="{{Auth::user()->u_apellido}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fecha-nacimiento"
                                    class="col-md-12 col-form-label">{{ __('Fecha de nacimiento') }}</label>
                                <input type="date" class="form-custom" name="u_fecha_nacimiento" id="u_fecha_nacimiento" value="{{Auth::user()->u_fecha_nacimiento}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="sexo"
                                    class="col-md-12 col-form-label">{{ __('Sexo') }}</label>
                                <select class="form-custom" name="u_sexo" id="u_sexo">
                                    <option {{(Auth::user()->u_sexo == 'H') ? 'selected' : ''}} value="H">Hombre</option>
                                    <option {{(Auth::user()->u_sexo == 'M') ? 'selected' : ''}} value="M">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="u_ciudad_residencia"
                                    class="col-md-12 col-form-label">{{ __('Ciudad de residencia') }}</label>
                                <input type="text" class="form-custom" name="u_ciudad_residencia" id="u_ciudad_residencia" value="{{Auth::user()->u_ciudad_residencia}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="u_profesion"
                                    class="col-md-12 col-form-label">{{ __('Profesión') }}</label>
                                <input type="text" class="form-custom" name="u_profesion" id="u_profesion" value="{{Auth::user()->u_profesion}}" required>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm mt-2 btn-settings-usuario-datos" data-id="{{Auth::user()->id}}"><i class="bi bi-arrow-clockwise"></i> Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.profile-img')
@endsection
@section('scripts')
    <script src="{{asset('js/_settings.min.js')}}"></script>
@endsection
