<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresas";

    protected $fillable = ['em_id','em_nombre','em_email','em_img_file','em_img_extension','em_password','em_pais','em_ciudad'];

}
