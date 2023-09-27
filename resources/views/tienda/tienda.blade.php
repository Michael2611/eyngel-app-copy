@extends('layouts.app')
@section('content')
    <div class="tienda-container">
        <div class="content">
            <div class="row">
                <div class="col-12 mx-auto">
                    <form action="" method="get">
                        <input class="form-custom mt-3 mb-3" type="search" name="search"
                            value="{{ $busqueda == '' ? '' : $busqueda }}" id="search" placeholder="Buscar tiendas...">
                    </form>
                </div>
            </div>
            @if ($tiendas->count() > 0)
            <div class="d-flex justify-content-end mb-2">
                <a class="btn btn-primary btn-sm" href="{{route('empresa.crear')}}" >Crear tienda</a>
            </div>
                <div class="row-tiendas">
                    @foreach ($tiendas as $tienda)
                        <div class="card-tienda shadow-sm">
                            <div class="" style="display: flex;">
                                <div class="logo">
                                    <img class="logo-tienda" onclick="window.location.href='{{URL::to('tienda/'.$tienda->t_nombre)}}';"
                                        src="{{ asset($tienda->t_img_logo) }}" alt="">
                                </div>
                                <div class="text">
                                    <p style="cursor: pointer; font-weight: 500; " onclick="window.location.href='{{URL::to('tienda/'.$tienda->t_nombre)}}';">{{ $tienda->t_nombre }}</p>
                                    <span id="descripcion">{{ $tienda->t_descripcion }}</span>
                                </div>
                                @if (Auth::user()->id == $tienda->t_id_user_create)
                                    <div class="admin">
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-list"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('empresa.crear-producto',$tienda->t_id)}}">Agregar productos</a></li>
                                                <li><a class="dropdown-item" href="#">Editar productos</a></li>
                                                <li><a class="dropdown-item" href="{{route('empresa.vista',$tienda->t_nombre)}}">Ver tienda</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div>
    </div>
@endsection
