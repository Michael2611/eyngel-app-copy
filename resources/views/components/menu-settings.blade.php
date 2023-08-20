<?php $route = request()->route()->getName(); ?>
<ul>
    <li class="{{($route == 'settings.index') ? 'active-menu' : ''}}"><a href="{{ URL::to('/settings') }}"><i class="bi bi-person-vcard"></i> Nombre
            de usuario</a></li>
    <li class="{{($route == 'settings.profile') ? 'active-menu' : ''}}"><a href="{{ URL::to('/settings/profile') }}"><i class="bi bi-pencil-square"></i> Editar perfil</a>
    </li>
    <li class="{{($route == 'settings.password') ? 'active-menu' : ''}}"><a href="{{ URL::to('/settings/password') }}"><i class="bi bi-key-fill"></i> Cambio de
            contraseña</a></li>
    <li class="{{($route == 'settings.index') ? 'active-menu' : ''}}"><a href="#" data-bs-toggle="modal" data-bs-target="#profile-img"><i
                class="bi bi-person-square"></i> Cambio de foto perfil</a></li>
    <li class="{{($route == 'settings.verify') ? 'active-menu' : ''}}"><a href="{{ URL::to('/settings/verify-count') }}"><i class="bi bi-patch-check"></i> Verificar
            cuenta</a></li>
    <!--<li class="{{($route == 'settings.bussines') ? 'active-menu' : ''}}"><a href="{{ URL::to('/settings/create-bussines') }}"><i class="bi bi-briefcase"></i> Solicitar espación tienda virtual</a></li>-->
</ul>