@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if (Auth::check())
            <div class="row">
                <div class="col-md-8">
                    <div id="card-post-content">
                        @if ($post_users->count())
                            @foreach ($post_users as $post)
                                <?php $verificado = DB::table('users_verify_count')
                                    ->where('uvc_id_users', $post->user->id)
                                    ->first(); ?>
                                @include('components.post-home')
                            @endforeach
                        @else
                            <div class="alert alert-secondary" style="width: 90%">No tenemos publicaciones, se el primero en
                                publicar...</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mt-2 d-flex justify-content-center">
                    <div class="a-fixed">
                        <div class="content-site-notify">
                            <div class="d-flex justify-content-end" id="button-notify">
                                <a class="btn btn-primary position-relative ver-notificaciones-btn"
                                    data-user="{{ Auth::user()->id }}" id="ver-notificaciones-btn">
                                    <i class="bi bi-bell"></i> Notificaciones
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        id="count-notify-site">
                                        <span class="visually-hidden"><i class="bi bi-bell"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="card shadow content-notify p-1 border-0 mb-2" id="content-notify-site"></div>
                        </div>
                        @include('components.sugerencia-visitar')
                        @include('components.anuncios-red-social')
                        <div class="card card-body mt-3 shadow border-0">
                            <h5 class="titulo-h5">Conviertete en creador:</h5>
                            <p class="text-default" style="font-size: 14px">Únete al Programa de socios de EYNGEL a fin de ganar dinero, debes
                                cumplir con los siguiente
                                requisito:</p>
                            <a class="btn btn-primary" href="{{URL::to(Auth::user()->u_nombre_usuario.'/monetizacion')}}">Requistios</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container" style="display:flex; justify-content: center">
                <div class="col-md-7">
                    <div id="card-post-content" style="margin-top: 70px">
                        @if ($post_users->count())
                            @foreach ($post_users as $post)
                                <?php $verificado = DB::table('users_verify_count')
                                    ->where('uvc_id_users', $post->id)
                                    ->first(); ?>
                                @include('components.post-home')
                            @endforeach
                        @else
                            <div class="alert alert-secondary" style="width: 90%">No tenemos publicaciones, se el primero en
                                publicar...</div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if ($post_users->count() > 0 && Auth::check())
        @include('components.modal-edit-post')
        @include('components.modal-d-post')
    @endif
    @include('components.modal-perfil-basico')
@endsection
