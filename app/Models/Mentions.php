<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentions extends Model
{
    use HasFactory;

    protected $table = "post_mentions";

    protected $fillable = ["pom_id", "pom_id_post", "pom_id_auth_user", "pom_id_user"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(PostUser::class);
    }
}
