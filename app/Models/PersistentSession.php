<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersistentSession extends Model
{
    use HasFactory;

    protected $table = "persistent_sessions";

    protected $fillable = [
        'id',
        'user_id',
        'token',
        'expiration_time'
    ];

}
