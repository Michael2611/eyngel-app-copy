@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} T Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} T Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ URL::to('admin/productos-actualizar', $tProducto->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')
                            @include('t-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
