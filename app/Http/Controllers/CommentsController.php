<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Tweet;
use App\Giphy;
use App\User;
use App\Mail\NewComment;
use App\jobs\SendNewCommentEmail;



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
            'photo' =>'nullable|max:1024',


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
        if($request->hasFile('photo')) {
                $filenameWtihExtention =  $request->file('photo')->getClientOriginalName();
                $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                $extention = $request->file('photo')->getClientOriginalExtension();
                $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
                $path =  $request->file('photo')->storeAs('public/comment_image' , $fileNameStore );
                $comment->photo = $fileNameStore;
            }


        $comment->save();
        // return ('Successfully added');
        SendNewCommentEmail::dispatch($comment);
          // return view('mail.email');



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
        if($request->hasFile('photo')) {
                $filenameWtihExtention =  $request->file('photo')->getClientOriginalName();
                $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                $extention = $request->file('photo')->getClientOriginalExtension();
                $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
                $path =  $request->file('photo')->storeAs('public/comment_image' , $fileNameStore );
                $comment->photo = $fileNameStore;
            }







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
