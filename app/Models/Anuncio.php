<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anuncio
 *
 * @property $id
 * @property $a_descripcion
 * @property $a_estado
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anuncio extends Model
{
    
    static $rules = [
		'a_descripcion' => 'required',
		'a_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['a_descripcion','a_estado'];



}
