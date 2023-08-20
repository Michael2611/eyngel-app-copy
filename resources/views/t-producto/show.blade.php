@extends('layouts.app')

@section('template_title')
    {{ $tProducto->name ?? "{{ __('Show') T Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} T Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('t-productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tp Id:</strong>
                            {{ $tProducto->tp_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Id Empresa:</strong>
                            {{ $tProducto->tp_id_empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Nombre:</strong>
                            {{ $tProducto->tp_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Descripcion:</strong>
                            {{ $tProducto->tp_descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Precio:</strong>
                            {{ $tProducto->tp_precio }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Enlace Producto:</strong>
                            {{ $tProducto->tp_enlace_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Tp Imagen:</strong>
                            {{ $tProducto->tp_imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
