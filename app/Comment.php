<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //set up the releationship
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
