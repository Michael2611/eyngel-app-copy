<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowersUsers extends Model
{
    use HasFactory;

    protected $table = "seguidores";

    protected $fillable = [
        'seguido_id_users',
        'seguidor_id_users',
        'seguidor_timestamp',
    ];

}
