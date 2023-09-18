<div class="modal fade" id="modaloptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-muro"><i
                        class="bi bi-chat-dots" style="padding-right: 10px"></i>
                    Mensajes</a>
                <a class="dropdown-item" id="shareButton" href="#"
                    onclick="copiarAlPortapapelesPerfil('{{ Auth::user()->u_nombre_usuario }}')"><i
                        class="bi bi-box-arrow-in-up-right" style="padding-right: 10px"></i>
                    Difundir perfil</a>
                <a class="dropdown-item" href="{{ URL::to('/settings') }}"><i class="bi bi-pencil"
                        style="padding-right: 10px"></i>
                    Editar cuenta</a>
                @if ($tienda->count() > 0)
                    <a class="dropdown-item" href="{{ URL::to('/tienda/dashboard-tienda/') }}"><i
                            class="bi bi-shop-window" style="padding-right: 10px"></i>
                        Tienda</a>
                @endif
                <a class="dropdown-item" href="{{ URL::to('/' . Auth::user()->u_nombre_usuario . '/monetizacion') }}"><i
                        class="bi bi-wallet2" style="padding-right: 10px"></i> Trabaja con
                    nosotros</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-d-cuenta"><i
                        class="bi bi-pencil" style="padding-right: 10px"></i> Eliminar
                    cuenta</a>
                <a class="dropdown-item" href="{{ route('home.salir') }}"><i class="bi bi-door-closed"
                        style="padding-right: 10px"></i>
                    Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>
