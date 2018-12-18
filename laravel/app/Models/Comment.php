<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'Comment';

    public function myPost()
    {
        return $this->belongsTo('Post', 'id_post', 'id_post');
    }

    public function myComment()
    {
        return $this->belongsTo('App\Models\User', 'uid', 'uid');
    }
}
