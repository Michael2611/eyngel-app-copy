@extends('layouts.app')
@section('content')
    <div class="p-2 border-0">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="border-0">
                        <h3 class="titulo-h3">Crear una tienda</h3>
                        <p class="text-default">Tu página es el lugar donde las personas obtienen más información sobre ti. Asegúrate de que
                            tenga toda la información que puedan necesitar.</p>
                        <form action="{{route('empresa.store')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @include('tienda.empresa')
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
