@if (Auth::check())
    <?php $ruta = Request::route()->getName(); ?>
    @if ($ruta != 'promocionar.index')
        <div class="content-menu-lateral-min">
            <div class="menu-lateral-min mt-2">
                <input class="form-custom" type="hidden" id="u_nombre_usuario" value="{{ Auth::user()->u_nombre_usuario }}"
                    readonly>
                <a href="{{ URL::to('/' . Auth::user()->u_nombre_usuario . '/') }}"
                    style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><img
                        class="logo-icon-header"
                        src="{{ Auth::user()->u_img_profile == '' ? asset('images/3135768.png') : asset(Auth::user()->u_img_profile) }}"
                        alt="img-profile"><span class="fw-bold" id="name-profile-notify"
                        style="padding-inline-start: 10px">{{ Str::ucfirst(Auth::user()->u_nombre_usuario) }}
                        @if (Auth::user()->cuenta_verificada == 1)
                            <span>
                                <img style="inline-size: 15px; block-size: 15px; object-fit: cover" title="Cuenta verificada"
                                    src="{{ asset('images/icons/icon-user-verify.png') }}" alt="icon-verify">
                            </span>
                        @endif
                    </span></a>
                <a href="{{ URL::to('/settings/verify-count') }}"
                    style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><i
                        class="bi bi-patch-check {{ $ruta == 'settings.verify' ? 'color' : '' }}"
                        style="font-size: 25px; padding-inline-end: 10px"></i> Sello de confianza</a>
                <a href="{{ URL::to('/visitando') }}"
                    style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><i
                        class="bi bi-person-workspace {{ $ruta == 'visitando' ? 'color' : '' }}"
                        style="font-size: 25px; padding-inline-end: 10px"></i> Siguiendo</a>
                <a href="{{ URL::to('/cargar') }}"
                    style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><i
                        class="bi bi-patch-plus {{ $ruta == 'post.cargar' ? 'color' : '' }}"
                        style="font-size: 25px; padding-inline-end: 10px"></i> Nueva publicación</a>
                <a href="{{ $ruta != 'tienda.index' ? route('tienda.index') : route('empresa.crear')}}"
                    style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><i
                        class="bi bi-bag-heart {{ $ruta == 'tienda.index' ? 'color' : '' }}"
                        style="font-size: 25px; padding-inline-end: 10px"></i> {{ $ruta != 'tienda.index' ? 'Tiendas' : 'Crear tienda' }}</a>
                <a href="#" style="display: flex; align-items: center; padding-inline-start: 20px; font-size: 15px"><i
                        class="bi bi-chat-text" style="font-size: 25px; padding-inline-end: 10px"></i> Crear canal
                    (pronto)</a>
                <hr>
            </div>
        </div>
    @endif
@endif
