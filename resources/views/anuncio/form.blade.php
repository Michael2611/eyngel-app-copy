<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    {{ Form::label('descripcion') }}
                    {{ Form::textarea('a_descripcion', $anuncio->a_descripcion, ['class' => 'form-control ckeditor' . ($errors->has('a_descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('a_descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    {{ Form::select('a_estado', [ 1 => 'Activo', 0 => 'Inactivo'], $anuncio->a_estado, ['class' => 'form-control' . ($errors->has('a_estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un estado']) }}
                    {!! $errors->first('a_estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar anuncio') }}</button>
    </div>
</div>
