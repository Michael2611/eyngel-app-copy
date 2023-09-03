@if (Auth::check())
    <?php $ruta = Request::route()->getName();?>
    @if ($ruta != 'promocionar.index')
        <div class="content-menu-lateral-min">
            <div class="menu-lateral-min mt-2">
                <input class="form-custom" type="hidden" id="u_nombre_usuario" value="{{ Auth::user()->u_nombre_usuario }}"
                    readonly>
                <a href="{{ URL::to('/' . Auth::user()->u_nombre_usuario . '/') }}"
                    style="display: flex; align-items: center; padding-left: 20px; font-size: 15px"><img
                        class="logo-icon-header"
                        src="{{ Auth::user()->u_img_profile == '' ? asset('images/3135768.png') : asset(Auth::user()->u_img_profile) }}"
                        alt="img-profile"><span class="fw-bold" id="name-profile-notify"
                        style="padding-left: 10px">{{ Str::ucfirst(Auth::user()->u_nombre_usuario) }}
                        @if (Auth::user()->cuenta_verificada == 1)
                        <span>
                            <img style="width: 15px; height: 15px; object-fit: cover" title="Cuenta verificada"
                                src="{{ asset('images/icons/icon-user-verify.png') }}" alt="icon-verify">
                        </span>
                    @endif</span></a>
                <a href="{{ URL::to('/settings/verify-count') }}"
                    style="display: flex; align-items: center; padding-left: 20px; font-size: 15px"><i
                        class="bi bi-patch-check {{ $ruta == 'settings.verify' ? 'color' : '' }}"
                        style="font-size: 25px; padding-right: 10px"></i> Verificado</a>
                        <a href="{{ URL::to('/visitando') }}"
                        style="display: flex; align-items: center; padding-left: 20px; font-size: 15px"><i
                            class="bi bi-person-workspace {{ $ruta == 'visitando' ? 'color' : '' }}"
                            style="font-size: 25px; padding-right: 10px"></i> Visitando</a>
                <a href="{{ URL::to('/cargar') }}"
                    style="display: flex; align-items: center; padding-left: 20px; font-size: 15px"><i
                        class="bi bi-patch-plus {{ $ruta == 'post.cargar' ? 'color' : '' }}"
                        style="font-size: 25px; padding-right: 10px"></i> Nueva publicación</a>
                <hr>
            </div>
        </div>
    @endif
@endif
