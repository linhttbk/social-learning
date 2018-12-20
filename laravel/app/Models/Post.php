<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'Post';

    public function groupMember()
    {
        return $this->belongsTo('GroupMember', 'id_group');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\User', 'uid');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'id_post');
    }
    public function ownPost(){
        return $this->belongsTo('App\Models\GroupUser', 'id_group');
    }
}
