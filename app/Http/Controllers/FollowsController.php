<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user){

        return auth()->user()->following()->toggle($user->profile);
        // $user->notify(new NewFollower (User::findorFail(2)));


    }
    

    // public function index(){
    //     return auth()->user()->following()->all();
    //
    // }
}
