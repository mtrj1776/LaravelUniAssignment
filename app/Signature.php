<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    // A signature has one User who created it
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
