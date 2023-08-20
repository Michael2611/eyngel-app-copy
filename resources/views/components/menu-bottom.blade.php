@if (Auth::user()->u_role == 0)
    <nav class="nav-bottom">
        <ul>
            @if (Auth::user()->u_role == 0)
                <li><a class="active" href="{{ url('/dashboard') }}" title="Inicio" tabindex="0" data-bs-toggle="popover"
                        data-bs-trigger="hover focus" data-bs-content="Disabled popover"><i
                            class="bi bi-house-door"></i></a>
                </li>
            @endif
            @if (Auth::user()->u_role == 0)
                <li><a href="{{ url('/usuario') }}" title="Usuario"><i class="bi bi-person-add"></i></a></li>
            @endif
            @if (Auth::user()->u_role == 0)
                <li><a href="{{ url('/invitar-amigos') }}" title="Información"><i class="bi bi-share"></i></a>
                </li>
            @endif
            @if (Auth::user()->u_role == 0 && Auth::user()->u_term_con == 1)
                <li><a href="{{ url('/contacto') }}" title="Contacto"><i class="bi bi-telephone-forward"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
