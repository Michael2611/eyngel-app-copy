@if (Auth::check())
    <div class="content-buttons">
        <div class="card-custom-icons" id="card-custom-icons">
            <div class="card-custom-icons-min">
                <span class="badge rounded-pill text-bg-light"
                    id="likes-count-{{ $post->pu_id }}"><strong><small></small></strong></span>
                <button class="button-red-min {{ $post_auth_like ? 'button-check-delete' : 'button-check' }} "
                    id="button-action-{{ $post->pu_id }}" data-auth="{{ Auth::user()->id }}"
                    data-video="{{ $post->pu_id }}"></button>
            </div>
            <?php $route = request()
                ->route()
                ->getName(); ?>
            <div class="card-custom-icons-min">
                <span class="badge rounded-pill text-bg-light"
                    id="post-count-{{ $post->pu_id }}"><strong><small></small></strong></span>
                <button class="button-red-min post" id="viewcomment" onclick="mostrarComentario({{ $post->pu_id }})"
                    data-bs-toggle="modal" data-bs-target="#opinion"><i class="bi bi-chat-left-dots"></i></button>
            </div>
            <div class="card-custom-icons-min">
                <div class="dropdown">
                    <button class="button-red-min btn-redes"
                        data-url="{{ ENV('APP_URL') }}{{ $post->user->u_nombre_usuario }}/post/{{ $post->pu_id }}"
                        title="Difundir" data-bs-toggle="modal" data-bs-target="#modalRedesSociales"><i
                            class="bi bi-share"></i></button>
                </div>
            </div>
        </div>
        <!--Dropdowm mentions-->
        <div class="content-mentions mt-3">
            <div class="form-group">
                <input type="text" id="mention" class="form-control" placeholder="Escribe @seguido de un usuario">
                <div id="mentionDropdown" class="dropdown">
                    <ul class="dropdown-menu" id="menu-mentions" role="menu">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
