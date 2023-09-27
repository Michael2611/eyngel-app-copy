@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="border-0">
            <h3 class="titulo-h3">Agregar nuevo</h3>
            <form action="{{url('/tienda/registro-producto')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('tienda.form')
            </form>
        </div>
        <br><br>
    </div>
@endsection