<div class="modal fade" id="profile-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body modal-body-profile">
                <img style="width: 90%; height: 300px; object-fit: contain; aspect-ratio:auto"
                    src="{{ $usuario->u_img_profile == '' ? asset('images/3135768.png') : asset($usuario->u_img_profile) }}"
                    alt="img-usuario">
                <div class="data-profile">
                    <form action="{{ URL::to('/cambiar-foto-perfil') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex gap-1">
                            <input type="file" class="form-control" name="img-profile" id="img-profile" required>
                            <button class="btn btn-primary" type="submit">Cargar</button>
                        </div>
                    </form>
                    <form action="{{ URL::to('/eliminar-foto-perfil') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}" readonly>
                        <button class="btn w-100 text-danger fw-bold mt-2 b-2" type="submit">Eliminar foto
                            actual</button>
                    </form>
                    <button class="btn w-100 mt-2 b-2" type="button" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
