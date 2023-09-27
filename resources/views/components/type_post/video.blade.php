@if (Auth::check())
    <div class="card card-custom-post mb-3 border-0 shadow-sm">
        <div class="card-header-custom p-2">
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
                        <small style="font-size: 13px; font-weight: 500">
                            está con
                            @if ($post->taggedUsers->count() > 0)
                                <a href="{{ URL::to('/' . $post->taggedUsers->first()->u_nombre_usuario) }}">{{ $post->taggedUsers->first()->u_nombre_usuario }}
                                </a>
                                @if ($post->taggedUsers->count() > 1)
                                    y {{ $post->taggedUsers->count() - 1 }} persona(s) más
                                @endif
                            @endif
                        </small>
                    @else
                        <p></p>
                    @endif
                </div>

            </div>
            @include('components.complement-profile')
        </div>
        <div class="card-custom-descripcion p-2">
            <p class="text-default mt-2"><?php echo $post->pu_descripcion; ?></p>
        </div>
        <div class="content-post-body">
            <div class="card-custom-post-body" id="card-custom-post-body">
                @foreach ($post->media as $media)
                    @if ($media->puf_extension == 'mp4' || $media->puf_extension == 'mov' || $media->puf_extension == 'AVI' || $media->puf_extension == 'MKV')
                        <video preload="auto" playsinline class="card-custom-video videoElemento" id="card-custom-video"
                            controlsList="nodownload" src="{{ asset($media->puf_file) }}" controls
                            data-id="{{ $post->pu_id }}" data-iduser={{ Auth::user()->id }} loading="lazy"></video>
                    @endif
                @endforeach
            </div>
            <small style="padding-left: 10px; color: rgb(58, 57, 57); font-weight: 500">Publicado:
                {{ $post->pu_timestamp }}</small>
            @include('components.button-icons-action')
        </div>
    </div>
@endif
