<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Tweet;
use App\Giphy;
use App\User;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'comment' => "required",


        ]);
        // @$result = response.data.data;

        $tweet = Tweet::where('id',$id)->firstorFail();
        $data = $request->all();
        //users
        $user_id =Auth::id();
        $comment = new Comment();
        $comment->comment= $request->comment;
        $comment->tweet()->associate($tweet);
        $comment->user_id= $user_id;
        $comment->gif = $request->gif;


        $comment->save();
        // return ('Successfully added');

            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);
        $comment= \App\Comment::find($id);


        return view('comments/edit', compact('tweet','comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $comment =\App\Comment::find($id);
        $comment->comment=$request->input('comment');


        $comment->gif = $request->gif;







        $comment->save();


        return redirect('/tweets/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
         // $tweet = Tweet::where('id',$id)->firstorFail();
        $comment= \App\Comment::findOrFail($id)->delete();


        if($comment){
            return back();
        }
            return (back());
    }
}
