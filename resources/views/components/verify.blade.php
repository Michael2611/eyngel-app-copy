@if (Auth::check())
@if ($verificado != null || $verificado != "")
<span>
    @if ($verificado->uvc_status == 1 && Auth::user()->id == $usuario->id)
        <img style="width: 15px; height: 15px; object-fit: cover" title="Cuenta verificada"
            src="{{ asset('images/icons/icon-user-verify.png') }}" alt="icon-verify">
    @endif
</span>
@endif

@endif