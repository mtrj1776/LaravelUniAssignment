<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // User can have many posts created by them
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    // User can have many threads created by them
    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    // A User can like many posts
    public function likes()
    {
        return $this->belongsToMany('App\Post');
    }
}
