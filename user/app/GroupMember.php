<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    //
    protected $table = 'GroupMember';

    public function members()
    {
        return $this->hasMany('User', 'uid', 'uid');
    }

    public function groupUser()
    {
        return $this->belongsTo('GroupUser', 'id_group',);
    }
}
