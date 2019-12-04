<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // A post has one User who created it
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // A Post has one Thread it belongs to
    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    // A post can have many Users like the post
    public function likes()
    {
        return $this->belongsToMany('App\User');
    }
}
