@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} T Producto
@endsection

@section('content')<br><br>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/tienda/dashboard-tienda') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Producto</li>
            </ol>
        </nav>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} T Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ URL::to('/admin/productos-store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('t-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
