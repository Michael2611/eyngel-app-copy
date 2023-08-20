<!-- Modal -->
<div class="modal fade" id="modal-edit-post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form method="post">
                    @csrf
                    <input type="hidden" class="idPostEdit" readonly>
                    <textarea class="form-control pu_descripcion" cols="30" rows="5" name="pu_descripcion" id="pu_descripcion"
                        placeholder="Escribe algo..." maxlength="500">{{ nl2br($post->pu_descripcion) }}</textarea>
                    <p class="mt-2" style="font-size: 14px" id="count"></p>
                    <button class="btn btn-primary edit-post-db">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
