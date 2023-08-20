<div class="modal fade" id="modal-seguidores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-2">
            @if ($tocando_count->count() > 0)
                <div class="modal-header mx-auto">
                    <h5 class="titulo-h5">Visitando</h5>
                </div>
                <div class="modal-body modal-body-profile">
                    <table class="table">
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($tocando_count as $data)
                                <tr>
                                    <td style="width: 10%"><img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%"
                                            src="{{ $data->u_img_profile == '' ? asset('images/3135768.png') : asset($data->u_img_profile) }}"
                                            alt=""></td>
                                    <td>
                                        <a class="mt-3 text-default"
                                            href="{{ URL::to('/' . $data->u_nombre_usuario) }}">{{ $data->u_nombre_usuario }}</a>
                                        <p class="text-default">
                                            <small>{{ $data->u_nombre . ' ' . $data->u_apellido }}</small></p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
            <div class="alert alert-secondary mt-2"><i class="bi bi-emoji-frown"></i> Por el momento no estás visitando a ningún usuario.</div>
            @endif
        </div>
    </div>
</div>
