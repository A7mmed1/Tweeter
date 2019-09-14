@extends('layouts.app')

@section('content')
      <h6 class="st btn rounded-circle">People to Follow</h6>
      <div class="container">
          <div class="d-flex flex-wrap ">
              @foreach($users as $user)
             <div class="col-sm-6 col-md-4 col-lg-3 mt-4 clearfix">
                <div class="card">
                    <img class="card-img-top rounded-circle"  src="/storage/profile_image/{{$user->profile->profileimage}}" >
                    <!-- <img class="card-img-top rounded-circle"  src="{{ URL::to('/')}}/images/{{$user->profile->profileimage}}" > -->

                <div class="card-block">
                    <figure class="profile">
                    </figure>
                    <h4 class="card-title mt-3">{{$user->name}}</h4>
                <div class="meta">
                        {{@$user->profile->location}}

                </div>
                <div class="card-text">
                        {{$user->email}}
                </div>
                </div>
                <div class="card-footer">
                    <small></small>
                    <p class="text-right m-0"><a href="/users/{{$user->id}}" class="btn btn-primary"><i class="far fa-user"></i> View Profile</a></p>
                </div>
                </div>

            </div>
            @endforeach
        </div>
     </div>




@endsection
