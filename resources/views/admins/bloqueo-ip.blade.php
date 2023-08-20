@extends('layouts.app')
@section('content')
    <div class="mx-auto" style="width: 95%">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <form action="{{url('/admin/bloqueo-ip/registro')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Ip a bloquear</label>
                          <input type="text" name="u_ip" id="u_ip" class="form-custom" required placeholder="Ingrese la ip que quiere bloquear el acceso">
                        </div>
                        <div class="mt-3">
                            <button class="bn bn-secondary" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Ip</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($ips as $item)
                            <tr>
                                <td>{{$item->ip_id}}</td>
                                <td>{{$item->ip_numero}}</td>
                                <td>{{$item->ip_fecha_bloqueo}}</td>
                                <td>
                                    <form action="{{url('/admin/bloqueo-ip/eliminar/'.$item->ip_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection