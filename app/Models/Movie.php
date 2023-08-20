<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 *
 * @property $id
 * @property $nombre
 * @property $imagen
 * @property $duracion
 * @property $descripcion
 * @property $url
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movie extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'imagen' => 'required',
		'duracion' => 'required',
		'descripcion' => 'required',
		'url' => 'required'
    ];

    protected $perPage = 20;
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','imagen','duracion','descripcion','url'];



}
