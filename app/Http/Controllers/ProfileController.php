<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Tweet;
use App\User;
use App\Profile;
use App\Notifications\NewFollower;




class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)

    {

        //
            $users = User::all();
            $user = Auth::user();
            $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile) : false;

    //   dd($follows);

        // $tweets = Tweet::user()->tweets;
        return view('profileList',[
            // 'tweets'=>$tweets,
            'users'=>$users,
            'follows' => $follows
        ]);
        // return view('profileList', compact('users', 'follows'));

            // 'users'=>$users,


        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
           'location' => 'required | min:5 | max:100',
           'birthday' => 'required | min:2 | max:400',
           'profileimage' =>'required|nullable|max:1024',
      ]);
        //

        $profile = new \App\Profile();
        $profile->user_id= Auth::user()->id;


    // assign properties to post, based on
    // properties from request data (form data)
        $profile->location=$request->input('location');
        $profile->birthday=$request->input('birthday');
        $profile->bio=$request->input('bio');

        if($request->hasFile('profileimage')) {
                $filenameWtihExtention =  $request->file('profileimage')->getClientOriginalName();
                $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                $extention = $request->file('profileimage')->getClientOriginalExtension();
                $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
                $path =  $request->file('profileimage')->move(base_path()'public/images' , $fileNameStore );
                $profile->profileimage = $fileNameStore;
            }
            // if($request->hasFile('profileimage')) {
            //         $filenameWtihExtention =  $request->file('profileimage')->getClientOriginalName();
            //         $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
            //         $extention = $request->file('profileimage')->getClientOriginalExtension();
            //         $fileNameStore = $fileName . '_' .  time(). '.' .$extention;
            //         $path =  $request->file('profileimage')->storeAs('public/profile_image' , $fileNameStore );
            //         $profile->profileimage = $fileNameStore;
            //     }



        $profile->save();
    //save post, simultaneosusly check to see if save was succesful


        // succes - redirect the user, to their new post
        return redirect('/users/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile) : false;
        $tweets = \App\Tweet::whereIn('user_id',$user)->latest()->paginate(2);


        $noti=$user->notify(new NewFollower (Auth::user()));
        // dd($noti);

        // if($exist){
        //     $delete =$user->notify(new NewFollower (Auth::user()))->delete();
        // }
        // if($delete)
        //            return back();


        return view('profile',[
            'tweets'=>$tweets,
            'user'=>$user,
            'follows' => $follows
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        $profile= \App\Profile::find($id);

        if(Auth::user()->cant('update', $profile)) {
            return back();
        }


        return view('edit', compact('user','profile'));
    }
    // public function followOrUnfollow(Request $request)
    // {
    //     if($request->$follows){
    //         $user= User::findOrFail($request->user);
    //         Auth::user()->following()->attach($user->id);
    //         $user->notify(new NewFollower (Auth::user()));
    //
    //     } else {
    //         $user = User()->following()->detach($user->id);
    //
    //     }
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = \App\Profile::where('user_id', $id)->limit(1)->first();


        //$profile->user_id= Auth::user()->id;
        $profile->location=$request->input('location');
        $profile->birthday=$request->input('birthday');
        $profile->bio=$request->input('bio');

        if($request->hasFile('profileimage')) {
                $filenameWtihExtention =  $request->file('profileimage')->getClientOriginalName();
                $fileName = pathinfo($filenameWtihExtention,PATHINFO_FILENAME);
                $extention = $request->file('profileimage')->getClientOriginalExtension();
                $fileNameStore = $fileName . '_' .  time(). '.' .$extention;

                $path =  $request->file('profileimage')->storeAs('public/profile_image' , $fileNameStore );
                $profile->profileimage = $fileNameStore;
            }



        $profile->save();


        return redirect('/users/');
    }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
