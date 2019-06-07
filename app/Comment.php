<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //relacion con videos
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
}
