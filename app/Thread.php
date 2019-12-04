<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    // A thread has one User who created it
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // A thread can have many posts created in them
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}