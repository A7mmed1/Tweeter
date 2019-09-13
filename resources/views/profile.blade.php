@extends('layouts.app')

@section('content')
        <!-- for background image -->

        <div class="ground"></div>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <!-- starting the profile -->
               <div class="profile2">
                    <div class="avatar ml-8">
                        <a href="{{ URL::to('/')}}/images/{{$user->profile->profileimage}}"><img src="{{ URL::to('/')}}/images/{{$user->profile->profileimage}}" width="200px;" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </a>
                    </div>
                    <div class="name ">
                        <h3 class="title mr-5"><i style="color:#3490DC"class="fas fa-check-circle">{{$user->name}}</i></h3>
                        <p class="btn ef text-muted"><span style="color:red "><i class="fas fa-map-marker-alt"></span></i>Location :  {{ @$user->profile->location }}</p>
                        <p class="btn ef text-muted"><span style="color:red "><i class="fas fa-birthday-cake"></span></i> Date Of Birth : {{ @$user->profile->birthday }}</p>
                        <p class="btn ef text-muted"><span style="color:red "><i class="far fa-calendar-check"></i></span> </i> Joined Since : {{ @$user->profile->created_at->diffForHumans() }}</p>

                    </div>
             </div>
         </div>
         <div class="col-md-12 description text-center ">
            <p class="btn"><i class="fas fa-info-circle"></i>Bio :{{ @$user->profile->bio }} </p>
         </div>
     </div>

    <div class="col-md-3 ml-auto mb-5">
        <!-- Edit profile and Follow Button  -->
            @if(!Auth::guest() && (Auth::user()->id == $user->profile->user_id))
            <a class="btn btn-success" href="/users/{{$user->id}}/edit"><i class="fas fa-edit">Edit Profile</i></a>
            @endif
            @if((auth()->check() && auth()->user()->id !== $user->id))

           <div><strong><follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button></strong> </div>
            @endif
            <!-- end of Edit profile and Follow Button  -->
    </div>
	<div class="row">
		<div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active btn-outline-success" href="{{url('/tweets')}}" >
                      {{$user->following->count()}}
                     Following
                    </a>
                </li>
                <li class="nav-item">
                    @if(@$user->profile->followers->count())
                    <span class="nav-link btn-light" href="{{url('/tweets')}}" role="tab" data-toggle="tab">
                     {{@$user->profile->followers->count()}}
                        Followers
                    </span>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-secondary" href="" role="tab" data-toggle="tab">
                        {{$user->tweets->count()}}
                        Tweets
                    </a>
                </li>
              </ul>
          </div>
	   </div>
   </div>
            <hr>
  <!-- Start Tweets  -->
    <div class="container text-center ">

        <div class="row ml-5 pl-5 ">
            @foreach($tweets as $tweet)
            <div class="col-md-6 ml-4 text-cente justify-content-center">

                    <img src="/storage/profile_image/{{$user->profile->profileimage}}" width="100"  class="rounded-circle" alt="profile">
                    <h2>{{ $tweet->user->name }}</h2>
                    <h4><strong><a href="/tweets/{{ $tweet->id }}">
                    {{$tweet->title}} </a></strong></h4><br>
                    {{$tweet->body}}

                    <p class="pull-left mt-2"> </p>
                <div class="row">
                    <a href="/storage/tweet_image/{{$tweet->image}}" class="thumbnail">
                    <img alt="Image"  width="400" src="/storage/tweet_image/{{$tweet->image}}" class="m-4 pull-right">
                    </a>
                    <div class="d-flex co">
                    <p class="p-2 m-1 mr-4"><i class="far fa-thumbs-up" style="color:#3490DC">like({{$tweet->likes()->count() }})</i></p>
                    <p class="p-2 m-1"><i class="far fa-comment-alt" style="color:#3490DC">Comment ({{$tweet->comments->count()}})</i></p>

                    <p class="p-2 mb-1"></small><i class="far fa-calendar-check p-2 text-muted">{{$tweet->created_at->diffForHumans()}}</i></small></p>

                    </div>
                    <hr>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
            <!-- End Tweets -->
            <!-- Pagination -->
            <p class="Page navigation example">{{$tweets->links()}}</p>
    </div>


    @endsection
