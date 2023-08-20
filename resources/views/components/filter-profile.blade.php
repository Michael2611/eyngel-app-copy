<ul class="filter-profile">
    <li><a href="?filter=hilos" id="button-filter" title="Solo hilos" data-content="hilos"><img class="img-filter"
        src="{{ asset('images/icons/icon-hilo-color.png') }}" alt="img-icon">
    <li><a href="?filter=images" id="button-filter" title="Solo imagenes" data-content="images">
            <img class="img-filter" src="{{ asset('images/icons/icon-image.png') }}" alt="img-icon">
        </a></li>
    <?php $route = request()->route()->getName(); ?>
    @if ($route != 'monetizacion.index' && $route != 'promocionar.index')
    <input type="hidden" value="{{$usuario->id}}" id="user-profile-id">
    @endif
    <li><a href="?filter=videos" id="button-filter" title="Solo videos" data-content="movies"><img class="img-filter"
                src="{{ asset('images/icons/icon-media.png') }}" alt="img-icon">
</ul>
