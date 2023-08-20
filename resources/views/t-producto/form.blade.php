
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tp_id_empresa') }}
            {{ Form::text('tp_id_empresa', $tProducto->tp_id_empresa, ['class' => 'form-control' . ($errors->has('tp_id_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Tp Id Empresa']) }}
            {!! $errors->first('tp_id_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tp_nombre') }}
            {{ Form::text('tp_nombre', $tProducto->tp_nombre, ['class' => 'form-control' . ($errors->has('tp_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Tp Nombre']) }}
            {!! $errors->first('tp_nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tp_descripcion') }}
            {{ Form::text('tp_descripcion', $tProducto->tp_descripcion, ['class' => 'form-control' . ($errors->has('tp_descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Tp Descripcion']) }}
            {!! $errors->first('tp_descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tp_precio') }}
            {{ Form::text('tp_precio', $tProducto->tp_precio, ['class' => 'form-control' . ($errors->has('tp_precio') ? ' is-invalid' : ''), 'placeholder' => 'Tp Precio']) }}
            {!! $errors->first('tp_precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tp_enlace_producto') }}
            {{ Form::text('tp_enlace_producto', $tProducto->tp_enlace_producto, ['class' => 'form-control' . ($errors->has('tp_enlace_producto') ? ' is-invalid' : ''), 'placeholder' => 'Tp Enlace Producto']) }}
            {!! $errors->first('tp_enlace_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tp_imagen') }}
            {{ Form::text('tp_imagen', $tProducto->tp_imagen, ['class' => 'form-control' . ($errors->has('tp_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Tp Imagen']) }}
            {!! $errors->first('tp_imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>