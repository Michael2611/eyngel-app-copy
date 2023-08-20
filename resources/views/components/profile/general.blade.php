<div class="container mt-4">
    <div id="card-row-profile">
        @foreach ($post_users as $post)
            @if ($post->pu_type == 'movie')
                <div class="card border-0">
                    <div class="card-header">@include('components.complement-profile')</div>
                    <div class="card-post-profile card-post-video">
                        @foreach ($post->media as $media)
                            <a href="{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}">
                                <img class="card-custom-video img_poster" id="img_poster"
                                    src="{{ asset('images/portada-video-inicio.png') }}" alt="poster">
                                <video class="card-custom-video card-custom-video-re" style="display: none"
                                    id="card-custom-video" src="{{ asset($media->puf_file) }}" controls
                                    onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}'"
                                    loading="lazy"></video>
                            </a>
                        @endforeach
                    </div>
                </div>
            @elseif($post->pu_type == 'img')
                <div class="card border-0">
                    <div class="card-header">@include('components.complement-profile')</div>
                    <div class="card-post-profile">
                        @if ($post->media->count() > 1)
                            <div id="carouselPost{{ $post->pu_id }}" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($post->media as $media)
                                        <div class="carousel-item active mt-4">
                                            <img class="card-custom-image" src="{{ asset($media->puf_file) }}"
                                                alt="img-post"
                                                onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}'"
                                                loading="lazy">
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
                                <div class="carousel-item active">
                                    <img class="card-custom-image" src="{{ asset($media->puf_file) }}" alt="img-post"
                                        onclick="window.location.href='{{ URL::to($post->user->u_nombre_usuario . '/post/' . $post->pu_id) }}'"
                                        loading="lazy">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
