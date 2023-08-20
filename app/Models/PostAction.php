<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAction extends Model
{
    use HasFactory;

    protected $table = "post_action";

    protected $fillable = ["poac_id","poac_id_user","poac_id_post", "poac_action", "poac_timestamp", "poac_check"];    
}
