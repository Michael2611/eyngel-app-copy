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
                <div class="card p-3 border-0 shadow-sm">
                    <p class="text-default fw-bold">Complete su perfil para obtener más novedades,
                        verificando y confirmando su correo electrónico</p>
                    @if (Auth::user()->email_verified_at == '')
                        <div class="alert alert-danger" role="alert">
                            <h6 class="titulo-h6">Verificación de Correo electronico</h6>
                            <p class="text-default">Revisa tu correo electronico de registro para completar el proceso de
                                verificación</p>

                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            <h6 class="titulo-h6">Verificación de Correo electronico</h6>
                            <p class="text-default">Su dirección de correo electronico es valida.</p>

                        </div>
                    @endif
                </div>
                <div class="card border-0 shadow-sm mt-3 mb-2">
                    <div class="card-header">Datos usuario</div>
                    <form method="post" class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label" for="u_nombre_usuario">Nombre usuario</label>
                            <input class="form-custom" type="text" name="u_nombre_usuario" id="usuario"
                                value="{{ Auth::user()->u_nombre_usuario }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="u_descripcion_perfil">Descripción perfil</label>
                            <textarea class="form-custom" name="u_descripcion_perfil" id="u_descripcion_perfil" cols="30" rows="4"
                                placeholder="Ingrese información sobre usted">{{ nl2br(Auth::user()->u_descripcion_perfil) }}</textarea>
                        </div>
                        <button class="btn btn-primary btn-sm mt-2 btn-settings-usuario" data-id="{{ Auth::user()->id }}"><i
                                class="bi bi-arrow-clockwise"></i> Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.profile-img')
@endsection
@section('scripts')
    <script src="{{ asset('js/_settings.js') }}"></script>
@endsection
