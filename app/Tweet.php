<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;
use Illuminate\Support\Facades\Auth;


class Tweet extends Model
{
    //
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function liked()
    {
    return (bool) Like::where('user_id', Auth::id())
                        ->where('tweet_id', $this->id)
                        ->first();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
