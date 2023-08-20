<div class="card-post-anuncios">
    @if (Auth::user()->u_role == 0)
        <div class="row">
            @if (Auth::user()->u_ciudad_residencia == '' || Auth::user()->u_ciudad_residencia == null)
                <div class="col-md-12 completar-perfil mt-1">
                    <div class="card p-3 mb-3 border-0 shadow-sm">
                        <h6 class="titulo-h6">Para conocer más personas, completa tu perfil.</h6>
                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/settings/profile') }}"><i
                                class="bi bi-person-bounding-box"></i> Completar</a>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
@if ($celebraciones->count() > 0)
    <div class="card border-0 mb-2 p-2">
        <p class="text-default">Celebraciones</p>
        <ul>
            @foreach ($celebraciones as $item)
                <li class="list-happy" style="font-size: 13px; list-style: none; margin-left: -30px;"><a
                        href="#"><i class="bi bi-balloon-heart"></i> Hoy está de fiesta
                        <strong>{{ $item->u_nombre . ' ' . $item->u_apellido }}</strong></a></li>
            @endforeach
        </ul>
    </div>
@endif
<!--<div class="card border-0 mt-2 shadow-sm">
    <div class="card-body">
        <h5 class="titulo-h5 text-center">¡Hola! {{ Auth::user()->u_nombre }}</h5>
        <p class="text-center text-default">para empezar a recibir Tokens Eyngel es necesario que verifique su dirección
            de correo electronico.</p>
        <div class="image-verify"
            style="width: 100%; height: 120px; display:flex; justify-content: center; align-items: center;">
            <img style="width: 150px; height: 100px;" src="{{ asset('images/icons/send-email-verify.png') }}"
                alt="">
        </div>
        <a class="btn btn-primary btn-sm" href="#">Reenviar verificación de correo electronico</a>

    </div>
</div>-->
