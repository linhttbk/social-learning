<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestHistory extends Model
{
    //
    protected $table = 'TestHistory';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'uid','uid');
    }
}
