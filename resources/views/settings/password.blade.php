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
                    <div class="card-header">Cambiar contraseña</div>
                    <form class="card-body" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="u_contra_actual">Contraseña actual</label>
                                    <input class="form-custom" type="password" name="u_contra_actual" id="u_contra_actual" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="u_contra_nueva">Contraseña nueva</label>
                                    <input class="form-custom" type="password" name="u_contra_nueva" id="u_contra_nueva" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="u_contra_nueva_confirm">Contraseña nueva confirmar</label>
                                    <input class="form-custom" type="password" name="u_contra_nueva_confirm" id="u_contra_nueva_confirm" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm mt-2 btn-settings-password" data-id="{{Auth::user()->id}}"><i class="bi bi-arrow-clockwise"></i> Actualizar</button>
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
