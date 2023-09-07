<?php
if (Auth::check()) {
    $post_auth_like = DB::table('post_action')
        ->where('poac_id_user', Auth::user()->id)
        ->where('poac_id_post', $post->pu_id)
        ->where('poac_action', 1)
        ->first();
    $verificado = DB::table('users_verify_count')
        ->where('uvc_id_users', $usuario->id)
        ->first();
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
        <input type="hidden" value="{{ $usuario->id }}" id="user-profile-id">
        <div class="content-post">
            <div class="post-media {{ $post->pu_type == 'movie' ? 'media-50' : 'media-60' }}">
                @if ($post->pu_type == 'movie')
                    @if ($post->media->count() > 1)
                        <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($post->media as $index => $media)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <video preload="auto" autoplay="true" playsinline class="card-custom-video"
                                            style="width: 100%; height: 100%; object-fit: cover" controlsList="nodownload"
                                            id="card-custom-video" loading="lazy" src="{{ asset($media->puf_file) }}"
                                            controls></video>
                                    </div>
                                @endforeach
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        @foreach ($post->media as $media)
                            <video preload="auto" autoplay="true" playsinline class="card-custom-video"
                                style="width: 100%; height: 100%; object-fit: cover" controlsList="nodownload"
                                id="card-custom-video" loading="lazy" src="{{ asset($media->puf_file) }}" controls></video>
                        @endforeach
                    @endif
                @elseif($post->pu_type == 'img')
                    @if ($post->media->count() > 1)
                        <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($post->media as $index => $media)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img class="card-image-custom-post" src="{{ asset($media->puf_file) }}"
                                            alt="img-post">
                                    </div>
                                @endforeach
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        @foreach ($post->media as $media)
                            <img class="card-image-custom-post" src="{{ asset($media->puf_file) }}" alt="img-post">
                        @endforeach
                    @endif
                @else
                    <div class="card-custom-descripcion card p-4" style="width: 50%;">
                        <p style="font-size: 15px"><?php echo $post->pu_descripcion; ?></p>
                    </div>
                @endif
            </div>
            <div class="post-info {{ $post->pu_type == 'movie' ? 'media-50' : 'media-40' }} bg-white shadow-sm">
                <div class="content-post-comment">
                    <div class="profile">
                        <div class="profile-post">
                            @include('components.complement-profile')
                            <img class="img-profile-min"
                                src="{{ $post->user->u_img_profile == '' ? asset('images/3135768.png') : asset($post->user->u_img_profile) }}"
                                alt="Imagen perfil"
                                onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                            <a class="text-default fw-bold"
                                href="{{ URL::to('/' . $post->user->u_nombre_usuario) }}">{{ Str::ucfirst($post->user->u_nombre_usuario) }}
                                <span>@include('components.verify')</span>
                                <br> <small class="text-muted" style="font-size: 11px">{{ $post->created_at }}</small></a>
                            @if (Auth::user()->id != $usuario->id)
                                <button class="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}" id="button-check-follow"
                                    data-auth="{{ Auth::user()->id }}"
                                    data-img="{{ $tocando ? 'bn-follow-delete' : 'bn-follow' }}"
                                    data-tocar="{{ $user_tocado->id }}"><img
                                        style="width: 40px; height: 40px; object-fit:contain" src=""
                                        id="img-follow"></button>
                            @endif
                        </div>
                    </div>
                    <div class="profile-post-descripcion">
                        <?php echo $post->pu_descripcion; ?>
                    </div>
                    <!-- action counts-->
                    <?php
                    $post_auth_like = DB::table('post_action')
                        ->where('poac_id_user', Auth::user()->id)
                        ->where('poac_id_post', $post->pu_id)
                        ->where('poac_action', 1)
                        ->first();
                    $post_users = DB::table('post_user')
                        ->select('pu_type', 'u_nombre_usuario', 'id', 'pu_id', 'pu_id_user', 'pu_descripcion')
                        ->join('users', 'post_user.pu_id_user', '=', 'users.id')
                        ->where('pu_id_user', $usuario->id)
                        ->get();
                    ?>
                    <div class="content-post-body">
                        @include('components.button-icons-action')
                    </div>
                </div>
            </div>
        </div>
    @else
    <br>
        <input type="hidden" value="{{ $usuario->id }}" id="user-profile-id">
        <div class="content-post">
            <div class="post-media {{ $post->pu_type == 'movie' ? 'media-50' : 'media-60' }}">
                @if ($post->pu_type == 'movie')
                    @if ($post->media->count() > 1)
                        <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($post->media as $media)
                                    <div class="carousel-item active">
                                        <video preload="auto" autoplay="true" playsinline class="card-custom-video"
                                            style="width: 100%; height: 100%; object-fit: cover" controlsList="nodownload"
                                            id="card-custom-video" loading="lazy" src="{{ asset($media->puf_file) }}"
                                            controls></video>
                                    </div>
                                @endforeach
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        @foreach ($post->media as $media)
                            <video preload="auto" autoplay="true" playsinline class="card-custom-video"
                                style="width: 100%; height: 100%; object-fit: cover" controlsList="nodownload"
                                id="card-custom-video" loading="lazy" src="{{ asset($media->puf_file) }}"
                                controls></video>
                        @endforeach
                    @endif
                @elseif($post->pu_type == 'img')
                    @if ($post->media->count() > 1)
                        <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($post->media as $media)
                                    <div class="carousel-item active">
                                        <img class="card-image-custom-post" src="{{ asset($media->puf_file) }}"
                                            alt="img-post">
                                    </div>
                                @endforeach
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: aquamarine; border-radius: 50%;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        @foreach ($post->media as $media)
                            <img class="card-image-custom-post" src="{{ asset($media->puf_file) }}" alt="img-post">
                        @endforeach
                    @endif
                @else
                    <div class="card-custom-descripcion card p-4" style="width: 50%;">
                        <p style="font-size: 15px"><?php echo $post->pu_descripcion; ?></p>
                    </div>
                @endif
            </div>
            <div class="post-info {{ $post->pu_type == 'movie' ? 'media-50' : 'media-40' }} bg-white shadow-sm">
                <div class="content-post-comment">
                    <div class="profile">
                        <div class="profile-post">
                            @include('components.complement-profile')
                            <img class="img-profile-min"
                                src="{{ $post->user->u_img_profile == '' ? asset('images/3135768.png') : asset($post->user->u_img_profile) }}"
                                alt="Imagen perfil">
                            <a class="text-default fw-bold"
                                href="{{ URL::to('/' . $post->user->u_nombre_usuario) }}">{{ Str::ucfirst($post->user->u_nombre_usuario) }}
                                <span>@include('components.verify')</span>
                                <br> <small class="text-muted"
                                    style="font-size: 11px">{{ $post->created_at }}</small></a>
                        </div>
                    </div>
                    <div class="profile-post-descripcion">
                        <?php echo $post->pu_descripcion; ?>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('components.modal-opinar')
    @include('components.modal-edit-post')
    @include('components.modal-d-post')
@endsection
