@if (Auth::check())
    <div class="card card-custom-post shadow-sm border-0">
        <div class="card-header-custom">
            <div class="name-profile">
                <img class="img-profile-min"
                    src="{{ $post->user->u_img_profile == '' ? asset('images/3135768.png') : asset($post->user->u_img_profile) }}"
                    alt="img-profile" loading="lazy"
                    onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                <div class="d-flex-column align-content-center">
                    <p class="title-profile" style="margin:0"
                        onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                        {{ $post->user->u_nombre_usuario }} @include('components.verify') <br></p>
                    @if ($post->taggedUsers->count() > 0)
                        <small style="font-size: 13px; font-weight: 500; color: darkslategray;">
                            está con
                            @if ($post->taggedUsers->count() > 0)
                                <a href="{{ URL::to('/' . $post->taggedUsers->first()->u_nombre_usuario) }}">{{ $post->taggedUsers->first()->u_nombre_usuario }}
                                </a>
                                @if ($post->taggedUsers->count() > 1)
                                    y <a href="#" data-bs-toggle="modal" data-bs-target="#modalEtiquetaPost{{$post->pu_id}}">{{ $post->taggedUsers->count() - 1 }} persona(s) más</a> 
                                @endif
                            @endif
                        </small>
                    @else
                        <small style="color: rgb(73, 73, 75); font-weight: 500">Publicado:
                            {{ $post->pu_timestamp }}</small>
                    @endif
                </div>

            </div>
            @include('components.complement-profile')
        </div>
        <div class="card-custom-descripcion p-2">
            <p class="text-default mt-2">{!! $post->pu_descripcion !!}</p>
        </div>
        <div class="content-post-body">
            <div class="card-custom-post-body" id="card-custom-post-body">
                @foreach ($post->media as $media)
                    @if ($media->puf_extension == 'mp4')
                        <video preload="auto" playsinline class="card-custom-video videoElemento" id="card-custom-video"
                            controlsList="nodownload" src="{{ asset($media->puf_file) }}" controls
                            data-id="{{ $post->pu_id }}" data-iduser={{ Auth::user()->id }} loading="lazy"></video>
                    @endif
                @endforeach
                @if ($post->pu_type == 'img')
                    @if ($post->media->count() > 1)
                        <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($post->media as $index => $media)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img class="card-custom-img" src="{{ asset($media->puf_file) }}"
                                            alt="imagen post" style="cursor: pointer"
                                            onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';">
                                    </div>
                                @endforeach
                            </div>
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
                    @else
                        <img class="card-custom-img" src="{{ asset($media->puf_file) }}"
                            onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';"
                            alt="imagen post">
                    @endif
                @endif
                @if ($post->pu_type == 'hilo')
                @endif
            </div>
            @if ($post->taggedUsers->count() > 0)
            <small style="padding-left: 10px; color: rgb(73, 73, 75); font-weight: 500">Publicado:
                {{ $post->pu_timestamp }}</small>
            @endif
            @include('components.button-icons-action')
        </div>
        @include('components.dropdowm_mentions')
    </div>
    <br>
@endif
