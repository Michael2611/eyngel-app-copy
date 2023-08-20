@extends('layouts.app')

@section('content')
    <header class="w-100 bg-white p-0">
        <div class="container-fluid">
            <h5 class="titulo-h5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paquetes</li>
                    </ol>
                </nav>
            </h5>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <div class="card__content">
                <div class="card_menu shadow-sm">
                    <div class="content__card_menu">
                        <i class="bi bi-list-task" id="icon__card_menu"></i>
                        <h3 class="titulo-h3 text-center">Registrar paquete</h3>
                        <a class="text-default" href="{{ url('/admin/paquete-nuevo') }}">Ir a registro</a>
                    </div>
                </div>
                <div class="card_menu shadow-sm">
                    <div class="content__card_menu">
                        <i class="bi bi-graph-up-arrow" id="icon__card_menu"></i>
                        <h3 class="titulo-h3 text-center">Registrar videos</h3>
                        <a class="text-default" href="{{ url('/admin/paquete-video') }}">Ir a registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection