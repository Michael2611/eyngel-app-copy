<?php
$user_tocado = DB::table('users')
    ->where('u_nombre_usuario', $usuario->u_nombre_usuario)
    ->first();
$tocando = DB::table('seguidores')
    ->where('seguido_id_users', Auth::user()->id)
    ->where('seguidor_id_users', $usuario->id)
    ->first();
?>
<div class="card border-0 shadow mt-2 mb-3 visitar-mobile">
    <div class="card-body">
        <h5 class="titulo-h5 fw-bold" style="line-height: 10px">A quién visitar</h5>
        <p class="text-default"><small>Ultimós registros</small></p>
        <ul style="padding: 0px" id="content-sugerencia-mobile"></ul>
    </div>
</div>
