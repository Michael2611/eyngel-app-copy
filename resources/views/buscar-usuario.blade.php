@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="titulo-h3 mb-2">Resultados de tu busqueda</h3>
        <div class="row text-center">
            @if ($results->count() > 0)
                @foreach ($results as $r)
                    <a class="col-md-3 mb-3" href="{{ URL::to('/' . $r->u_nombre_usuario) }}">
                        <div class="card card-body border-0 shadow">
                            <div class="row">
                                <div class="col-md-12 col-sm-6"><img
                                        style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%"
                                        src="{{ $r->u_img_profile == null ? asset('images/3135768.png') : asset($r->u_img_profile) }}"
                                        alt=""></div>
                                <div class="col-md-12 col-sm-6">
                                    <h5 class="titulo-h5 mt-3">{{ Str::ucfirst($r->u_nombre) . ' ' . Str::ucfirst($r->u_apellido) }}</h5>
                                    <p class="text-default mt-2" style="font-size: 13px; line-height: 15px">
                                        <?php echo $r->u_descripcion_perfil; ?></p>
                                    @if ($r->u_profesion != '')
                                        <span
                                            class="text-default badge text-bg-secondary"><small>{{ $r->u_profesion }}</small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div>
                    <div class="alert alert-secondary" role="alert">
                        Lo sentimos, no hemos encontrado resultados de acuerdo a tu busqueda.
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
