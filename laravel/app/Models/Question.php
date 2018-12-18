<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'Question';

    //
    public function answer()
    {
        return $this->hasOne('App\Models\Answer', 'id_question', 'id');
    }
}
