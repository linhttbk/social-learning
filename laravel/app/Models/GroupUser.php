<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'GroupUser';

    //
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'uid', 'uid');
    }

    public function groupMember()
    {
        return $this->hasMany('App\Models\GroupMember', 'id_group', 'id');
    }

    public function members()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\GroupMember', 'id_group', 'uid', 'id', 'uid')
            ->where('GroupMember.role', '!=', 2);
    }
    public function posts(){
        return $this->hasMany('App\Models\Post', 'id_group', 'id');
    }

    public function myListPost()
    {
        return $this->hasMany('App\Models\Post', 'id_group', 'id');
    }
}
