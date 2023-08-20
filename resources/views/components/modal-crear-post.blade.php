<!-- Modal -->
<div class="modal fade" id="crear-post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deja tu opinión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content-opinion"></div>
            </div>
            <div class="modal-footer">
                <div class="d-flex gap-2 w-100">
                    <input class="form-custom" type="text" name="opinion" id="opinion-text">
                    <input class="idVideoPo" type="hidden" id="id" readonly>
                    <button class="btn btn-primary btn-sm btn-opinar" data-video="{{ $post->pu_id }}"
                        data-user="{{ Auth::user()->id }}">Opinar</button>
                </div>
            </div>
        </div>
    </div>
</div>
