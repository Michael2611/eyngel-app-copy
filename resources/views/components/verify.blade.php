@if (Auth::check())
    @if ($post->user->cuenta_verificada == 1)
        <span>
            <img style="width: 15px; height: 15px; object-fit: cover" title="Cuenta verificada"
                src="{{ asset('images/icons/icon-user-verify.png') }}" alt="icon-verify">
        </span>
    @endif
@endif
