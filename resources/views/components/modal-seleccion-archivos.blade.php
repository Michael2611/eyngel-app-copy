<div class="modal modal-lg fade" id="modal-multimedia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="titulo-h4">Seleccionar promoción</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="titulo-h5">Publicaciones realizadas</h5>
                <div class="mt-3"></div>
                <div class="view-post">
                    @foreach ($user_eyngel_id as $item)
                        <div class="post">
                            @if ($item->pu_extension == 'mp4' || $item->pu_extension == 'webp')
                                <video class="img-post" controls src="{{ asset($item->pu_file) }}"></video>
                            @else
                                <img class="img-post" src="{{ asset($item->pu_file) }}" alt="">
                            @endif
                            <input type="checkbox" class="btn-check mt-1" name="ane_file" id="ane_file{{ $item->pu_id }}"
                                value="{{$item->pu_file}}">
                            <label class="btn btn-primary files mt-1" name="ane_file"  for="ane_file{{ $item->pu_id }}">Seleccionar</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
