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
                    {{ $post->user->u_nombre_usuario }} @include('components.verify') <br> <small class="text-muted">Etiquetas</small></p>
            </div>
            @include('components.complement-profile')
        </div>
        <div class="card-custom-descripcion p-2">
            <p class="text-default mt-2"><?php echo $post->pu_descripcion; ?></p>
        </div>
        <div class="content-post-body">
            <div class="card-custom-post-body" id="card-custom-post-body">
                @if ($post->pu_type == 'hilo')
                @endif
            </div>
            <small style="padding-left: 10px; color: red; font-weight: 500">Publicado: {{ $post->pu_timestamp }}</small>
            @include('components.button-icons-action')
        </div>
    </div>

@endif
