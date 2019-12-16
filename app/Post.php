<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ 'post_comment_box'];
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

    public function tags()
    {
        // include the model (optional items below if convention was not followed)
        // name of two models in alphabetical order (for any pivot table on laravel)
        // current model coloumn id
        // joining model column id
        return $this->belongstoMany('App\Tag');
    }

    // A post can have many Users like the post
    public function likes()
    {
        return $this->belongsToMany('App\User');
    }
}
