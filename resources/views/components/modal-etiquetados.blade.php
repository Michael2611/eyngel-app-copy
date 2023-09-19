<div class="modal fade" id="modalEtiquetaPost{{ $post->pu_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modalEtiqueta">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Personas</h1>
            </div>
            <div class="modal-body">
                @foreach ($post->taggedUsers as $post)
                    <div class="content-user-li">
                        <img class="img-profile-min"
                            src="{{ $post->u_img_profile == '' ? asset('images/3135768.png') : $post->u_img_profile }}"
                            alt="">
                        <a class="text-default" style="padding-left: 10px" href="{{URL::to('/'.$post->u_nombre_usuario)}}">{{ $post->u_nombre_usuario }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
