@extends('layouts.app')

@section('content')

<div class="container">

    <div><h1>Profile</h1></div>

        <div class="row">

            <div class="col-3 m-1">
            <a href="/storage/profile_image/{{$user->profile->profileimage}}">   <img src="/storage/profile_image/{{$user->profile->profileimage}}" width="200px;"  class="rounded-circle" alt=""></a>

            </div>
            <div class="col-9 pt-5">

                <div><h1></h1></div>


                <div><h2>{{$user->name}}<i style="color:#3490DC;"class="fas fa-check-circle"></i></h2></div>
                <div class="lo">
                    <span style="color:red; "><i class="fas fa-map-marker-alt"></span></i>Location :    {{ @$user->profile->location }}
                </div>
                <div class="bi">
                    <i class="fas fa-birthday-cake"> Date Of Birth :    {{ @$user->profile->birthday }}</i>

                </div>
                <div class="text-inline">
                        <span class="text-inline"><i class="fas fa-info-circle"></i>Bio: {{ @$user->profile->bio }}</span>

                </div>
                <div class="d-flex">
                    <div class="p-2"> <a href="{{url('/tweets')}}"><strong><h6><strong>{{$user->following->count()}}</strong> Following</h6></strong></a>  </div>
                    @if(@$user->profile->followers->count())
                    <div class="p-2"> <a href="{{url('/tweets')}}"><strong><h6><strong>{{@$user->profile->followers->count()}}</strong> Followers</h6></strong></a>  </div>
                    @endif
                    <div class="p-2"><strong><h6><strong>{{$user->tweets->count()}}</strong> Tweets</h6></strong> </div>
                    @if(auth()->check() && auth()->user()->id !== $user->id)
                    <div><strong><follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button></strong> </div>
                    @endif
                </div>
            </div>
                    <hr>
                    <br>

        <div class="container">
            <div class="text-right">
                        @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                        @endif

                <div class="text-center mr-40">
                        @foreach($user->tweets as $tweet)
                    <div class="col-12">
                        <img src="/storage/profile_image/{{$user->profile->profileimage}}" width="100px;"  class="rounded-circle" alt="">

                            <h2>{{ $tweet->user->name }}</h2>

                    </div>
                            <h5><a href="/tweets/{{ $tweet->id }}"><i class="far fa-eye"> {!!$tweet->title!!}</i></a></h5>
                            <td> <a href="/storage/tweet_image/{{$tweet->image}}"> <img src="/storage/tweet_image/{{$tweet->image}}" width="200px"alt="photo"></a>

                            <hr>
                            <h4>{!!$tweet->body!!}</h4>
                            <!-- <img src="/storage/tweet_image/{{$tweet->image}}" alt=""> -->
                            <small><i class="fas fa-calendar-check p-2 text-muted">{{$tweet->created_at->diffForHumans()}}</i></small>
                            <span style="color:#3490DC;" >
                                like({{$tweet->likes()->count() }})
                            Comment ({{$tweet->comments->count()}})
                            </span>
                            <hr>
                            @endforeach
                </div>
                <div class="text-center">

                    <td>    @if(!Auth::guest() && (Auth::user()->id == $user->profile->user_id))</td>

                        <a class="btn btn-success" href="/users/{{$user->id}}/edit"><i class="fas fa-edit">Edit Profile</i></a>

                                @endif
                               <!-- adding @ before the user avoid the error of undefine var

                             <!-- <a href="/users/">Friends </a> -->
                 </div>
            </div>
        </div>
                    <hr>
    </div>
</div>



@endsection
