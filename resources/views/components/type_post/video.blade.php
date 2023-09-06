@if (Auth::check())
    <div class="card card-custom-post mb-3 border-0 shadow-sm">
        <div class="card-header-custom p-2">
            <div class="name-profile">
                <img class="img-profile-min"
                    src="{{ $post->user->u_img_profile == '' ? asset('images/3135768.png') : asset($post->user->u_img_profile) }}"
                    alt="img-profile" loading="lazy"
                    onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                <p class="title-profile"
                    onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                    {{ $post->user->u_nombre_usuario }} @include('components.verify') <br> <small
                        class="text-muted">{{ $post->pu_timestamp }}</small></p>
            </div>
            @include('components.complement-profile')
        </div>
        <div class="card-custom-descripcion p-2">
            <p class="text-default mt-2"><?php echo $post->pu_descripcion; ?></p>
        </div>
        <div class="content-post-body">
            <div class="card-custom-post-body" id="card-custom-post-body">
                @foreach ($post->media as $media)
                    @if ($media->puf_extension == 'mp4')
                        <video preload="auto" poster="{{ asset('images/portada-video-inicio.png') }}" playsinline
                            class="card-custom-video videoElemento" id="card-custom-video" controlsList="nodownload"
                            src="{{ asset($media->puf_file) }}" controls data-id="{{ $post->pu_id }}"
                            data-iduser={{ Auth::user()->id }}
                            onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';"
                            loading="lazy"></video>
                    @endif
                @endforeach
            </div>
            @include('components.button-icons-action')
        </div>
    </div>
@endif
