<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function followers()
    {
            return $this->belongsToMany('App\User');
    }
}
