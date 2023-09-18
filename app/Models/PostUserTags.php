<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserTags extends Model
{
    use HasFactory;

    protected $table = "post_user_tags";

    protected $fillable = ["post_tag_id", "post_tag_pu_id", "post_tag_user_id"];
}
