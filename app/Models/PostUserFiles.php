<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserFiles extends Model
{
    use HasFactory;

    protected $table = "post_user_files";

    protected $primaryKey = 'puf_id';

    protected $fillable = [
        'puf_id',
        'puf_id_post',
        'puf_file',
        'puf_extension'
    ];

    public function post()
    {
        return $this->belongsTo(PostUser::class, 'pu_id');
    }

}
