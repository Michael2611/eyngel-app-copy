@extends('layouts.app')

@section('template_title')
    Anuncio
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Anuncio') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ URL::to('/admin/crear-anuncio') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No.</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>---</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anuncios as $anuncio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $anuncio->a_descripcion }}</td>
                                            <td>
                                                @if ($anuncio->a_estado == 1)
                                                    <span class="badge text-bg-success">Activo</span>
                                                @else
                                                    <span class="badge text-bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form class="d-flex ml-1"
                                                    action="{{ URL::to('/admin/eliminar-anuncio', $anuncio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ URL::to('/admin/anuncios', $anuncio->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $anuncios->links() !!}
            </div>
        </div>
    </div>
@endsection
