@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row" id="content-settings">
            <div class="col-md-4 mt-4">
                <div class="card p-3 border-0 shadow-sm">
                    @include('components.menu-settings')
                </div>
            </div>
            <div class="col-md-8 mt-2">
                <div class="card p-3 border-0 shadow-sm mt-3">
                    <div class="alert alert-default alert-success" id="text-message"></div>
                    <form enctype="multipart/form-data" id="{{empty($empresa) == 1 ? 'tienda-form-registration' :  'tienda-form-update'}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_nombre">Nombre empresa</label>
                                <input class="form-custom" type="text" name="t_nombre" id="t_nombre"
                                    value="{{empty($empresa->t_nombre) == 1 ? '' :  $empresa->t_nombre}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_eslogan">Eslogan</label>
                                <input class="form-custom" type="text" name="t_eslogan" id="t_eslogan"
                                    value="{{empty($empresa->t_eslogan) == 1 ? '' : $empresa->t_eslogan}}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_descripcion">Descripción</label>
                                <input class="form-custom" type="text" name="t_descripcion" id="t_descripcion"
                                    value="{{empty($empresa->t_descripcion) == 1 ? '' : $empresa->t_descripcion}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_direccion">Dirección</label>
                                <input class="form-custom" type="text" name="t_direccion" id="t_direccion"
                                    value="{{empty($empresa->t_direccion) == 1 ? '' : $empresa->t_direccion}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_telefono">Telefono contacto</label>
                                <input class="form-custom" type="text" name="t_telefono" id="t_telefono"
                                    value="{{empty($empresa->t_telefono) == 1 ? '' : $empresa->t_telefono}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_correo">Correo electronico contacto</label>
                                <input class="form-custom" type="text" name="t_correo" id="t_correo"
                                    value="{{empty($empresa->t_correo) == 1 ? '' : $empresa->t_correo}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="previewLogo"></div>
                            <div class="col-md-12 form-group">
                                <label class="col-form-label" for="t_img_logo">Logo</label>
                                <input class="form-custom" type="file" name="t_img_logo" id="t_img_logo" accept="image/*"
                                    >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_enlace">Enlace sitio web</label>
                                <input class="form-custom" type="url" name="t_enlace" id="t_enlace"
                                    value="{{empty($empresa->t_enlace) == 1 ? '' : $empresa->t_enlace}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label" for="t_enlace">Pais</label>
                                <select class="form-custom" name="t_id_pais" id="t_id_pais">
                                    <option value="">-- Seleccione --</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{$pais->pa_id}}" {{(empty($empresa->t_id_pais) == 1 ? '' : $empresa->t_id_pais == $pais->pa_id) ? 'selected' : ''}}>{{$pais->pa_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm mt-2"
                            data-id="{{ Auth::user()->id }}"><i class="bi bi-arrow-clockwise"></i> Solicitar
                            creación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.profile-img')
@endsection
@section('scripts')
    <script src="{{ asset('js/_settings.min.js') }}"></script>
@endsection
