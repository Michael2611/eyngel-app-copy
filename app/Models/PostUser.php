<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;

    protected $table = "post_user";

    protected $primaryKey = 'pu_id';

    protected $fillable = [
        'pu_id',
        'pu_id_user',
        'pu_tipo_vista',
        'pu_descripcion',
        'pu_timestamp',
        'pu_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pu_id_user');
    }

    public function media()
    {
        return $this->hasMany(PostUserFiles::class, 'puf_id_post');
    }

    public function mentions()
    {
        return $this->hasMany(Mentions::class);
    }

    //etiquetas
    public function taggedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_tags', 'post_tag_pu_id', 'post_tag_user_id');
    }
}
