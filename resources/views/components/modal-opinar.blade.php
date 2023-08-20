@if (Auth::check())
    <!-- Modal -->
<div class="modal fade" id="opinion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Opiniones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content-opinion"></div>
            </div>
            <div class="modal-footer justify-content-start gap-2">
                <div class="d-flex gap-2 w-100">
                    <img class="img-profile-min" src="{{(Auth::user()->u_img_profile == "") ? asset('/images/3135768.png') : asset(Auth::user()->u_img_profile) }}" alt="">
                    <textarea name="opinion" id="opinion-text" autocomplete="off" cols="30" rows="1" placeholder="Deja tu opinión aquí..."></textarea>
                    <input class="idVideoPo" type="hidden" id="idpostop" readonly>
                    <input type="hidden" id="authuser" value="{{Auth::user()->id}}" readonly>
                </div>
                <div class="d-flex">
                    <button class="btn btn-primary btn-sm btn-opinar" id="btn-opinar" onclick="registrarComentario()" @if ($post_users->count()>0) data-video="{{ $post->pu_id }}" @endif data-user="{{ Auth::user()->id }}">Opinar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        const textarea = document.getElementById('opinion-text');

        textarea.addEventListener('input', () => {
            // Ajustar la altura del textarea al contenido
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
            // Limitar la altura máxima del textarea
            const maxHeight = parseInt(window.getComputedStyle(textarea).maxHeight);
            if (textarea.scrollHeight > maxHeight) {
                textarea.style.overflowY = 'scroll';
            } else {
                textarea.style.overflowY = 'hidden';
            }
        });
    </script>
@endsection

@endif
