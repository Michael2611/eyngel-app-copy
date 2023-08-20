@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="border-0">
            <h3 class="titulo-h3">Registro de productos TIENDA</h3>
            <hr>
            <form action="{{url('/admin/tienda/registro-empresa')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('tienda.form-empresa')
            </form>
        </div>
        <br><br>
    </div>
@endsection