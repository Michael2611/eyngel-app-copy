<div class="modal fade" id="modal-d-cuenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="titulo-h3">¿Eliminar cuenta de EYNGEL?</h3>
            </div>
            <div class="modal-body">
                <p class="text-default">Recuerda que una vez eliminada la cuenta, no podras recuperar tu información y contenido.</p>
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{URL::to('/delete-count')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary btn-post-d" type="submit">Continuar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
