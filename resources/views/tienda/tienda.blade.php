@extends('layouts.app')
@section('content')
    <div class="tienda-container">
        <div class="row">
            <div class="col-12">
                <form action="" method="get">
                    <input class="form-custom mt-3 mb-3" type="search" name="search" value="{{($busqueda == '' ? '' : $busqueda)}}" id="search" placeholder="Buscar tiendas...">
                </form>
            </div>
            <div class="col-12">
                <div class="pagination justify-content-center"> 
                    {{ $tiendas->links() }}
                </div>
            </div>
        </div>
        @if ($tiendas->count()>0)
            <div class="row-tiendas">
                @foreach ($tiendas as $tienda)
                    <a class="card-tienda" href="{{URL::to('tienda/'.$tienda->t_nombre)}}">
                        <img class="img-tienda" src="{{asset($tienda->t_img_logo)}}" alt="">
                        <p>{{$tienda->t_nombre}}</p>
                        <p>{{$tienda->t_eslogan}}</p>
                    </a>
                @endforeach
            </div>
        @else
            
        @endif
    </div>
@endsection
