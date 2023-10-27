<div class="p-2">
    <div class="row">
        <div class="col-md-12">
            <div class="content-post-eyngel shadow-sm">
                <p class="text-default">¡Comparte tu genialidad con una publicación!</p>
                <!--selección tipo cargue-->
                <div class="d-flex gap-2 justify-content-center align-items-center mb-3" id="menu-cargar">
                    <img class="img-profile-min"
                        src="{{ $usuario->u_img_profile == '' ? asset('images/3135768.png') : asset($usuario->u_img_profile) }}"
                        alt="Imagen perfil">
                    <p class="text-default fw-bold" style="margin-top: 10px">{{ $usuario->u_nombre_usuario }}</p>
                    <select class="mt-3 mb-3" name="pu_tipo_vista" id="pu_tipo_vista"
                        style="padding: 5px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; background-color: #f7f7f7; color: #333333; width: 70%;">
                        <option value="general" style="background-color: white; color: #333333;">Para Todos</option>
                        <option value="visitantes" style="background-color: white; color: #333;">Mis Visitantes</option>
                    </select>
                    <div class="button-selection">
                        <input type="file" class="btn-check" name="pu_file[]" id="option2" autocomplete="off"
                            value="img" onchange="preview()" multiple accept=".jpg, .jpeg, .png, .mp4, .mov" capture>
                        <label class="btn btn-light" for="option2"><img class="img-filter"
                                style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-image.png') }}" alt="img-icon"> / <img class="img-filter"
                                style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-media.png') }}" alt="img-icon"></label>
                        <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off"
                            value="text" checked>
                        <label class="btn btn-light" for="option4"><img class="img-filter"
                                style="width: 20px; height: 20px; object-fit: cover"
                                src="{{ asset('images/icons/icon-hilo-color.png') }}" alt="img-icon"></label>
                    </div>
                </div>
                <!--fin selección tipo cargue-->
                <!--etiquetas usuarios-->
                <div class="text-default">Etiqueta a tus visitantes...</div>
                <select class="js-example-basic-multiple w-100" name="users_id[]" multiple="multiple">
                    @foreach ($usuarios as $user)
                        <option value="{{ $user->id }}">{{ $user->u_nombre_usuario }}</option>
                    @endforeach
                </select>
                <!--fin etiquetas-->
                <div class="alert alert-success" role="alert" id="message-upload" style="display: none"></div>
                <p class="text-muted" style="font-weight: 500" id="text-message"></p>
                <div class="form-group">
                    <textarea class="form-control" cols="30" rows="2" name="pu_descripcion" id="pu_descripcion"
                        placeholder="Escribe algo..." maxlength="500"></textarea>
                    <p class="mt-2" style="font-size: 14px" id="count"></p>
                </div>
                <!--contenedor de imagenes -->
                <div class="col-md-12 bg-white shadow-sm border-1 mb-2">
                    <div id="contenedorImg"></div>
                </div>
                <!--fin contenedor-->
                <div class="row">
                    <div class="col-md-12 mb-2" id="files1">
                        <div class="form-group">
                            <p style="font-size: 13px" id="message-movie"></p>
                            <div class="container-input"></div>
                            <p style="font-size: 12px" id="num-of-files"></p>
                        </div>
                    </div>
                </div>
                <div class="progress mt-2 mb-2" role="progressbar" id="progress-bar" style="display: none"
                    aria-label="Basic example" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" id="progress"></div><br>
                    <p>Cargando...</p>
                </div>
                <div class="d-flex justify-content-start mt-2">
                    <button class="btn btn-primary btn-publicar" id="btn-publicar" type="submit">Publicar</button>
                </div>
            </div>
        </div>
    </div>
</div>
