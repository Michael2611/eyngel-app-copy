<div class="content-text-mentions" id="content-text-mentions{{ $post->pu_id }}">
    <div class="content">
        <div class="profile-mentions">
            <img class="img-profile-min-mentions" src="{{ asset(Auth::user()->u_img_profile) }}"
                alt="">
        </div>
        <div class="content-mentions">
            <div class="form-group">
                <form action="" method="post">
                    @csrf
                    <div class="d-flex gap-1">
                        <input type="text" id="mention" class="form-control mention-input"
                            data-post-id="{{ $post->pu_id }}" placeholder="Escribe @seguido" required>
                        <button class="btn btn-primary btn-mentions" data-post="{{ $post->pu_id }}"><i
                                class="bi bi-at"></i></button>
                    </div>
                </form>
                <div class="dropdown mention-dropdown" id="mentionDropdown" class="dropdown"
                    data-post-id="{{ $post->pu_id }}">
                    <ul class="dropdown-menu border-0 shadow" data-post-id="{{ $post->pu_id }}"
                        id="menu-mentions" role="menu">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>