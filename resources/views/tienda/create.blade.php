@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="border-0">
            <h3 class="titulo-h3">Registro de productos TIENDA</h3>
            <hr>
            <form action="{{url('/tienda/dashboard-tienda/registro-producto')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body">
                    @include('tienda.form')
                </div>
            </form>
        </div>
        <br><br>
    </div>
@endsection