<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="t_nombre">Empresa</label>
            <input type="text" class="form-control" name="t_nombre" id="t_nombre" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="t_direccion">Dirección</label>
            <input type="text" class="form-control" name="t_direccion" id="t_direccion" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="t_telefono">Telefono contacto</label>
            <input type="text" class="form-control" name="t_telefono" id="t_telefono" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="t_correo">Correo electronico</label>
            <input type="text" class="form-control" name="t_correo" id="t_correo" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-form-label" for="t_imagen">Imagen</label>
            <input type="file" class="form-control" name="t_imagen" id="t_imagen" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-form-label" for="t_enlace">Sitio web o fan page</label>
            <input type="text" class="form-control" name="t_enlace" id="t_enlace" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-form-label" for="t_pais">Pais</label>
            <select class="js-example-basic-single" name="t_pais" id="t_pais" style="width: 100%" required>
                @foreach ($paises as $pais)
                    <option value="{{$pais->pa_id}}">{{$pais->pa_nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-form-label" for="t_eslogan">Eslogan</label>
            <input type="text" class="form-control" name="t_eslogan" id="t_eslogan" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-form-label" for="">Descripción empresa</label>
            <textarea class="ckeditor" name="t_descripcion" id="t_descripcion" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-start">
            <button class="btn btn-primary mt-4" type="submit">Guardar</button>
        </div>
    </div>
</div>
