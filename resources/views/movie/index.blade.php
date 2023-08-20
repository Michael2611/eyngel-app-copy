@extends('layouts.app')

@section('template_title')
    Movie
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-12" >
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Movie') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ URL::to('crear-pelicula') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Duracion</th>
										<th>Descripcion</th>
										<th>Url</th>
										<th>Creat At</th>
										<th>Update At</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $movie->nombre }}</td>
											<td>{{ $movie->imagen }}</td>
											<td>{{ $movie->duracion }}</td>
											<td>{{ $movie->descripcion }}</td>
											<td>{{ $movie->url }}</td>
											<td>{{ $movie->creat_at }}</td>
											<td>{{ $movie->update_at }}</td>

                                            <td>
                                                <form action="{{ URL::to('eliminar-pelicula', $movie->id) }}" method="POST">
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
                {!! $movies->links() !!}
            </div>
        </div>
    </div>
@endsection
