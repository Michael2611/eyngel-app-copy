<?php
if (Auth::check()) {
    $user_tocado = DB::table('users')
        ->where('u_nombre_usuario', $usuario->u_nombre_usuario)
        ->first();
    $tocando = DB::table('seguidores')
        ->where('seguido_id_users', Auth::user()->id)
        ->where('seguidor_id_users', $usuario->id)
        ->first();
}
?>
@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div class="container">
            <div class="content-profile">
                <div class="content-profile-header">
                    <!--Imagen de perfil-->
                    <a href="#"
                        {{ Auth::user()->id == $usuario->id ? 'data-bs-toggle=modal data-bs-target=#profile-img' : 'data-bs-toggle=modal data-bs-target=#imageProfile' }}><img
                            class="card-img-profile"
                            src="{{ $usuario->u_img_profile == '' ? asset('images/3135768.png') : asset($usuario->u_img_profile) }}"
                            alt="img-profile" loading="lazy">
                    </a>
                    <!--fin-->
                    <!--info-->
                    <div class="info-red-min">
                        <div class="d-flex gap-2" id="movil-perfil">
                            <a style="font-size: 25px; font-weight: 700" href="{{ $usuario->u_nombre_usuario }}">
                                {{ Str::ucfirst($usuario->u_nombre_usuario) }}
                                @if (Auth::check())
                                    @if ($usuario->cuenta_verificada == 1)
                                        <span>
                                            <img style="width: 15px; height: 15px; object-fit: cover"
                                                title="Cuenta verificada"
                                                src="{{ asset('images/icons/icon-user-verify.png') }}" alt="icon-verify">
                                        </span>
                                    @endif
                                @endif
                            </a>
                            @if (Auth::user()->id == $usuario->id)
                                <button style="display: none" class="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}"
                                    id="button-check-follow" data-auth="{{ Auth::user()->id }}"
                                    data-img="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}"
                                    data-tocar="{{ $user_tocado->id }}"><img
                                        style="width: 40px; height: 40px; object-fit:contain"
                                        src="{{ asset('images/icons/no-te-visitan.png') }}" id="img-follow"></button>
                            @elseif(Auth::user()->id != $usuario->id)
                                <button class="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}" id="button-check-follow"
                                    data-auth="{{ Auth::user()->id }}"
                                    data-img="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}"
                                    data-tocar="{{ $user_tocado->id }}"><img
                                        style="width: 40px; height: 40px; object-fit:contain"
                                        src="{{ asset('images/icons/no-te-visitan.png') }}" id="img-follow"></button>
                            @endif
                            @if (Auth::user()->id == $usuario->id)
                                <button class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modaloptions"><i class="bi bi-plus-circle"></i></button>
                            @endif
                        </div>
                        <h6 class="titulo-h6">
                            {{ Str::ucfirst($usuario->u_nombre) . ' ' . Str::ucfirst($usuario->u_apellido) }}
                            <br> <small class="text-primary">{{ $usuario->u_profesion }}</small>
                        </h6>
                        <div class="">
                            <a href="#"
                                {{ Auth::user()->id == $usuario->id ? 'data-bs-toggle=modal data-bs-target=#modal-seguidos' : '' }}><small><strong
                                        id="follow-count-te-visitan"> </strong></small></a>
                            @if (Auth::user()->id == $usuario->id)
                                <a href="#"
                                    {{ Auth::user()->id == $usuario->id ? 'data-bs-toggle=modal data-bs-target=#modal-seguidores' : '' }}><small><strong
                                            id="follow-count-visitando"></strong></small></a>
                            @endif
                        </div>
                        <div class="presentation">
                            <p class="text-default" style="font-weight: 400; line-height: 18px"><?php echo $usuario->u_descripcion_perfil; ?></p>
                        </div>
                    </div>
                    <!--fin-->
                </div>
            </div>
            <?php
            $filter = '';
            ?>
            @if ($post_users->count() > 0)
                <div class="d-flex justify-content-center align-items-center gap-5" id="menu-filter-movil"
                    style="list-style: none">
                    <li><a class=" " id="menu-movil-link" href="?filter=images" title="Solo imagenes">
                            <img style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-image.png') }}" alt="icon-hilo-mobile">
                        </a></li>
                    <li><a class=" " id="menu-movil-link" href="?filter=videos" title="Solo videos"><img
                                style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-media.png') }}" alt="icon-hilo-mobile"></a></li>
                    <li><a class="" id="menu-movil-link" href="?filter=hilos" title="Solo hilos">
                            <img style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-hilo-color.png') }}" alt="icon-hilo-mobile"></a></li>
                </div>
                @if (Auth::user()->id != $usuario->id)
                    @include('components.input_opinion_perfil')
                @endif
                @include('components.profile.general')
            @else
                <div class="alert alert-secondary mt-4" role="alert">
                    ¡Sin publicaciones aún? ¡Es hora de mostrar tu contenido al mundo!
                    <a href="{{ URL::to('/cargar') }}">Compartir</a>
                </div>
            @endif
        </div>
        @include('components.profile-img')
        @include('components.modal-visitando')
        @include('components.modal-te-visitan')
        @include('components.modal-perfil-basico')
        @include('components.modal-d-cuenta')
        @include('components.modal-muro')
    @else
        <div class="container">
            <div class="content-profile">
                <div class="content-profile-header">
                    <!--Imagen de perfil-->
                    <a href="#"><img class="card-img-profile"
                            src="{{ $usuario->u_img_profile == '' ? asset('images/3135768.png') : asset($usuario->u_img_profile) }}"
                            alt="img-profile" loading="lazy">
                    </a>
                    <!--fin-->
                    <!--info-->
                    <div class="info-red-min">
                        <div class="d-flex gap-2" id="movil-perfil">
                            <h4 class="titulo-h4">{{ Str::ucfirst($usuario->u_nombre_usuario) }}
                                @include('components.verify')
                            </h4>
                        </div>
                        <h6 class="titulo-h6">
                            {{ Str::ucfirst($usuario->u_nombre) . ' ' . Str::ucfirst($usuario->u_apellido) }}
                            <br> <small class="text-primary">{{ $usuario->u_profesion }}</small>
                        </h6>
                        <div class="presentation">
                            <p class="text-default" style="font-weight: 400; line-height: 18px"><?php echo $usuario->u_descripcion_perfil; ?></p>
                        </div>
                    </div>
                    <!--fin-->
                </div>
            </div>
            <?php
            $filter = '';
            ?>
            @if ($post_users->count() > 0)
                <div class="d-flex justify-content-center align-items-center gap-5" id="menu-filter-movil"
                    style="list-style: none">
                    <li><a class=" " id="menu-movil-link" href="?filter=images" title="Solo imagenes">
                            <img style="width: 30px; height: 30px; object-fit: cover"
                                src="{{ asset('images/icons/icon-image.png') }}" alt="icon-hilo-mobile">
                        </a></li>
                    <li><a class=" " id="menu-movil-link" href="?filter=videos" title="Solo videos"><img
                                style="width: 30px; height: 30px; object-fit: cover"
                                src="{{ asset('images/icons/icon-media.png') }}" alt="icon-hilo-mobile"></a></li>
                    <li><a class="" id="menu-movil-link" href="?filter=hilos" title="Solo hilos">
                            <img style="width: 30px; height: 30px; object-fit: cover"
                                src="{{ asset('images/icons/icon-hilo-color.png') }}" alt="icon-hilo-mobile"></a></li>
                </div>
                @include('components.profile.general')
            @else
                <div class="alert alert-secondary mt-4" role="alert">
                    ¡Sin publicaciones aún? ¡Es hora de mostrar tu contenido al mundo!
                    <a href="{{ URL::to('/cargar') }}">Compartir</a>
                </div>
            @endif
        </div>
    @endif
@endsection
@if (Auth::check())
@include('components.view-image-profile')
@include('components.modal-perfil-opciones')
@endif
@if ($post_users->count() > 0 && Auth::check())
    @include('components.modal-d-post')
@endif
