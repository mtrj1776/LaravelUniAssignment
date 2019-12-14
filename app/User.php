<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        // User can have many threads created by them
    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    // User can have many posts created by them
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // A has one signature only - one to one relationship
    public function signature()
    {
        return $this->hasOne('App\Signature');
    }

    // A User can like many posts
    public function likes()
    {
        return $this->belongsToMany('App\Post');
    }
}