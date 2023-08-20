<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TProducto
 *
 * @property $tp_id
 * @property $tp_id_empresa
 * @property $tp_nombre
 * @property $tp_descripcion
 * @property $tp_precio
 * @property $tp_enlace_producto
 * @property $tp_imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property TEmpresa $tEmpresa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TProducto extends Model
{
    
    static $rules = [
		'tp_id' => 'required',
		'tp_id_empresa' => 'required',
		'tp_nombre' => 'required',
		'tp_descripcion' => 'required',
		'tp_precio' => 'required',
		'tp_imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tp_id','tp_id_empresa','tp_nombre','tp_descripcion','tp_precio','tp_enlace_producto','tp_imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tEmpresa()
    {
        return $this->hasOne('App\Models\TEmpresa', 't_id', 'tp_id_empresa');
    }
    

}
