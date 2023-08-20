<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-4 mt-2 mb-2">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $movie->nombre, ['class' => 'form-custom' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-8 mt-2 mb-2">
                <div class="form-group">
                    {{ Form::label('Url imagen') }}
                    {{ Form::text('imagen', $movie->imagen, ['class' => 'form-custom' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Url Imagen']) }}
                    {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-4 mt-2 mb-2">
                <div class="form-group">
                    {{ Form::label('duracion') }}
                    {{ Form::text('duracion', $movie->duracion, ['class' => 'form-custom' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duracion']) }}
                    {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-8 mt-2 mb-2">
                <div class="form-group">
                    {{ Form::label('Url Pelicula') }}
                    {{ Form::text('url', $movie->url, ['class' => 'form-custom' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url Pelicula']) }}
                    {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 mt-2 mb-2">
                <div class="form-group">
                    {{ Form::label('Descripción') }}
                    {{ Form::textarea('descripcion', $movie->descripcion, ['class' => 'form-custom ckeditor' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary mt-3" type="submit">Guardar</button>
            </div>
        </div>
    </div>
</div>