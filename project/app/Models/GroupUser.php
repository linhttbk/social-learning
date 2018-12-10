<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'GroupUser';

    //
    public function owner()
    {
        return $this->belongsTo('User', 'uid', 'uid');
    }

    public function groupMember()
    {
        return $this->hasMany('App\Models\GroupMember', 'id_group', 'id');
    }

    public function members()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\GroupMember', 'id_group', 'uid', 'id', 'uid');
    }
}
