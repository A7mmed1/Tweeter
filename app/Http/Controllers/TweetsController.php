<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

use App\Tweet;
use App\Comment;


class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = auth()->user()->following()->pluck('profiles.user_id');

        $tweets = \App\Tweet::whereIn('user_id',$users)->latest()->paginate(3);

        // $user = Auth::user();
        // $userIds = $user->following()->pluck('id')->toArray();
        // $tweets = Tweet::whereIn('user_id', $userIds)->orWhere('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        // $tweets = \App\Tweet::orderBy('created_at', 'DESC')->get();
             // $tweets = Tweet::user()->tweets;





        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          request()->validate([
             'title' => 'required | min:5 | max:100',
             'body' => 'required | min:2 | max:10000',
             'image' =>'required|nullable'
        ]);




        //     $filenameWtihExtention =  $request->file('image')->getClientOriginalName();
        //     $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $fileNameStore = $fileName . '_' .  time(). '.' .$extension;
        //     $path =  $request->file('image')->storeAs('public/tweet_image' , $fileNameStore );
        //
        // }else{
        //     $fileNameStore = 'noImage.jpg';
        // }





        // instantiate new, empty Tweet 
            $tweet = new \App\Tweet();



        // assign properties to t, based on
            $tweet->title=$request->input('title');
            $tweet->body=$request->input('body');
            // $tweet->image = $request->file('image');
            //$tweet->author=$request->input('author');
            // $tweet->image = $fileNameStore;
            if($request->hasFile('image')) {
                    $filenameWtihExtention =  $request->file('image')->getClientOriginalName();
                    $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                    $extention = $request->file('image')->getClientOriginalExtension();
                    $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
                    $path =  $request->file('image')->storeAs('public/tweet_image' , $fileNameStore );
                    $tweet->image = $fileNameStore;
                }

            $tweet->user_id= Auth::id();




            $tweet->save();

            // $request->file('image')->move(public_path('upload'), $img_name);
        //save tweet, simultaneosusly check to see if save was succesful


            // succes - redirect the user, to their new post
            return redirect('/tweets/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = \App\Tweet::find($id);

        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tweet= \App\Tweet::find($id);

        if( Auth::user()->cant('update', $tweet)) {
            return back();
        }


        return view('/tweets/edit', compact('tweet'));
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
        $tweet = \App\Tweet::find($id);


        $tweet->title=$request->input('title');
        $tweet->body=$request->input('body');
        if($request->hasFile('image')) {
                $filenameWtihExtention =  $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                $extention = $request->file('image')->getClientOriginalExtension();
                $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
                $path =  $request->file('image')->storeAs('public/tweet_image' , $fileNameStore );
                $tweet->image = $fileNameStore;
            }
        $tweet->save();


        return view('tweets.show', compact('tweet'));
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet= \App\Tweet::find($id)->delete();

        if($tweet){
            return redirect('/tweets');
        }
            return back();
    }

    public function like(Tweet $tweet){
        Auth::user()->likes()->attach($tweet->id);

        return back();


        // $existing =\App\Like::where('user_id',Auth::id())
        //                     ->where('tweet_id',$id)
        //                     ->count();
        //         if($existing)
        //         {
        //             $delete = \App\Like::where('user_id',Auth::id())
        //                               ->where('tweet_id',$id)
        //                               ->delete();
        //
        //             if($delete)
        //             return back();
        //
        //     }
        //
        //     $like = new \App\Like;
        //     $like->user_id = Auth::id();
        //     $like->tweet_id = $id ;
        //
        //
        //     if($like->save())
        //     {
        //             return back();
        //     }
        //
        // }
    }
        public function unlike(Tweet $tweet)
    {
        Auth::user()->likes()->detach($tweet->id);

        return back();
    }


}
