@if (Auth::check())
    <div class="complement-profile">
        @if (Auth::user()->id == $post->user->id)
            <div class="button-delete-post">
                <button class="border-0" style="background-color: transparent" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="bi bi-grid"></i></button>
                <ul class="dropdown-menu shadow border-0">
                    <a class="dropdown-item edit_post" href="#" data-bs-toggle="modal"
                        data-bs-target="#modal-edit-post" data-idPost="{{ $post->pu_id }}"
                        data-description="<?php echo $post->pu_descripcion; ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                    <a class="dropdown-item show_post" href="#" data-bs-toggle="modal"
                        data-bs-target="#modal-d-post" data-id="{{ $post->pu_id }}"><i class="bi bi-trash3"></i>
                        Eliminar publicación</a>
                    @if ($post->pu_type != 'hilo')
                        <a class="dropdown-item"
                            href="{{ URL::to('/' . Auth::user()->u_nombre_usuario . '/post/' . $post->pu_id) }}"><i
                                class="bi bi-eye"></i> Ir a la publiciación</a>
                    @endif
                </ul>
            </div>
        @endif
    </div>
@endif
