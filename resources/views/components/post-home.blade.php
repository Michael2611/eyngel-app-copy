@if (Auth::check())
    <?php $post_like = DB::table('post_action')
        ->select(DB::raw('count(*) as like_count'))
        ->where('poac_id_post', $post->pu_id)
        ->where('poac_action', 1)
        ->first();
    $post_comment = DB::table('post_comment')
        ->where('poc_id_post', $post->pu_id)
        ->get();
    $post_auth_like = DB::table('post_action')
        ->where('poac_id_user', Auth::user()->id)
        ->where('poac_id_post', $post->pu_id)
        ->where('poac_action', 1)
        ->first(); 
        $verificado = DB::table('users_verify_count')
        ->where('uvc_id_users', $post->user->id)
        ->first();
    ?>
    
    @if (request()->input('filter') == '')
        @include('components.type_post.todo')
    @endif

    @if (request()->input('filter') == 'hilos' && $post->pu_type == 'hilo')
        @include('components.type_post.hilo')
    @endif

    @if (request()->input('filter') == 'images' && $post->pu_type == 'img')
        @include('components.type_post.imagen')
    @endif

    @if (request()->input('filter') == 'videos' && $post->pu_type == 'movie')
        @include('components.type_post.video')
    @endif
@else
    <div class="container">
        <div class="card card-custom-post mb-3 border-0 shadow-sm">
            <div class="card-header-custom p-2">
                <div class="name-profile">
                    <img class="img-profile-min"
                        src="{{ $post->user->u_img_profile == '' ? asset('images/3135768.png') : asset($post->user->u_img_profile) }}"
                        alt="img-profile" loading="lazy">
                    <p class="title-profile"
                        onclick="window.location.href='{{ URL::to('/' . $post->user->u_nombre_usuario) }}';">
                        {{ $post->user->u_nombre_usuario. " " }}  <br> <small
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
                                onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';"
                                loading="lazy"></video>
                        @endif
                    @endforeach
                    @if ($post->pu_type == 'img')
                        @if ($post->media->count() > 1)
                            <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($post->media as $media)
                                        <div class="carousel-item active">
                                            <img class="card-custom-img" src="{{ asset($media->puf_file) }}"
                                                alt="imagen post" style="cursor: pointer"
                                                onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';">
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
                            <img class="card-custom-img" src="{{ asset($media->puf_file) }}"
                                onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';"
                                alt="imagen post">
                        @endif
                    @endif
                    @if ($post->pu_type == 'hilo')
                    @endif
                </div>
                @include('components.button-icons-action')
            </div>
        </div>
    </div>
@endif


@include('components.modal-opinar')
