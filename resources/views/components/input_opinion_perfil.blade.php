<div class="alert alert-success mt-2 mb-2" id="message-muro" style="display: none"></div>
<div class="container-opinio-perfil mt-2 w-100 card p-2 border-0 shadow-sm mb-3">
    <div class="d-flex gap-2 align-items-center">
        <img class="img-profile-min" style="position: absolute; margin-top: -25px; margin-left: 5px"
            src="{{ (Auth::user()->u_img_profile == "") ? asset('images/3135768.png') : asset(Auth::user()->u_img_profile) }}" alt="">
        <form method="post">
            @csrf

            <textarea name="opinion-text" id="opinion-text" style="padding-left: 70px" cols="100%" rows="1"
                placeholder="Dejale un mensaje por tu visita..."></textarea>
            <button class="btn btn-primary btn-sm btn-publicar-muro" data-idauth="{{ Auth::user()->id }}"
                data-idpubli="{{ $usuario->id }}" type="submit">Publicar</button>
        </form>
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
