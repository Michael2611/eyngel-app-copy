@extends('layouts.app')

@section('template_title')
    T Producto
@endsection

@section('content')
<br><br> <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/tienda/dashboard-tienda') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver Producto</li>
            </ol>
        </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('T Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ URL::to('/admin/crear-productos') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tp Id</th>
										<th>Tp Id Empresa</th>
										<th>Tp Nombre</th>
										<th>Tp Descripcion</th>
										<th>Tp Precio</th>
										<th>Tp Enlace Producto</th>
										<th>Tp Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $tProducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tProducto->tp_id }}</td>
											<td>{{ $tProducto->tp_id_empresa }}</td>
											<td>{{ $tProducto->tp_nombre }}</td>
											<td>{{ $tProducto->tp_descripcion }}</td>
											<td>{{ $tProducto->tp_precio }}</td>
											<td>{{ $tProducto->tp_enlace_producto }}</td>
											<td>{{ $tProducto->tp_imagen }}</td>

                                            <td>
                                                <form action="{{ URL::to('/admin/eliminar-productos', $tProducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ URL::to('/admin/productos', $tProducto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
