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
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: aquamarine;border-radius: 50%;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselPost{{ $post->pu_id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: aquamarine;border-radius: 50%;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @else
                        @foreach ($post->media as $media)
                            <img class="card-custom-img" src="{{ asset($media->puf_file) }}"
                                onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}';"
                                alt="imagen post">
                        @endforeach
                    @endif
                @endif
            </div>
            <small style="padding-left: 10px; color: rgb(54, 54, 54); font-weight: 500">Publicado:
                {{ $post->pu_timestamp }}</small>
            @include('components.button-icons-action')
        </div>
    </div>
@endif
