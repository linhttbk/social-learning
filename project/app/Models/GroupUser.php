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

    public function groupMember(){
        return $this->hasOne('GroupMember','id_group','id');
    }
}
