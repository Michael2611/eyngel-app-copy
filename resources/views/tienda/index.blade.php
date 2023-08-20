@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="titulo-h1">Tienda</h1>
            <a class="btn btn-primary" href="{{URL::to('admin/tienda/crear-empresa/')}}">Registrar empresa</a>
        </div>
        <div class="row card mt-4 border-0 p-4">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Logo</th>
                            <th>Estado</th>
                            <th>---</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        @foreach ($tiendas as $tienda)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tienda->t_nombre}}</td>
                                <td>{{$tienda->t_direccion}}</td>
                                <td>{{$tienda->t_telefono}}</td>
                                <td>{{$tienda->t_correo}}</td>
                                <td><img class="logo_empresa_icon" src="{{asset($tienda->t_img_logo)}}" alt=""></td>
                                <td>{{$tienda->pa_nombre}}</td>
                                <td>{{($tienda->t_estado == 1) ? 'ACTIVO' : 'INACTIVO'}}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary" href="{{URL::to('/tienda/crear-producto/'.$tienda->t_nombre)}}" title="Agregar producto"><i class="bi bi-plus-circle"></i></a>
                                        <a class="btn btn-light" href="{{URL::to('/ver-producto/'.$tienda->t_nombre)}}" title="Ver tienda"><i class="bi bi-eye"></i></a>
                                        <form action="{{URL::to('/tienda/eliminar-empresa/'.$tienda->t_nombre)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
