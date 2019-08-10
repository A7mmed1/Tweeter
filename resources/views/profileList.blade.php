@extends('layouts.app')

@section('content')





  <h5 class="st rounded-circle">Who to follow</h5>

<!--
  <div class="card-group">
      @foreach($users as $user)

  <div class="card pro">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">.<button class="btn btn-primary pro" >  <a href="/users/{{$user->id}}"> <span style="font-size: ; color:white; "> View Profile </span></a></button></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{$user->email}}.</small>
    </div>
    @endforeach
  </div> -->
  <!-- <div class="d-flex"> -->
 @foreach($users as $user)
 <div class="container text-center clearfix m-6">
     <div class="m-4 fi  p-2 m-4">
          <div class="card pro float-left m-3">
              <div class="back">
                  s
              </div>
                    <img src="/storage/profile_image/{{$user->profile->profileimage}}" width="150px;"  class="rounded-circle" alt="">
              <div class="container  d-md">
                  <h4><b> <i class="fal fa-badge-check">{{$user->name}} </i></b></h4>
                    <small class="text-muted">{{$user->email}}.</small>
                    <br>
                    <small>{{@$user->profile->location}}</small>
                    @if(auth()->check() && auth()->user()->id !== $user->id)
                    <p><button class="btn btn-primary pro rounded-circle" >  <a href="/users/{{$user->id}}"> <span style="font-size: ; color:white; "> View Profile </span></a></button></p>
                    @endif
              </div>
          </div>
      </div>
    @endforeach
</div>

<!-- </div> -->

<!-- <div class="col-4"> -->


            <!-- <div class="card">

          <img src="img.jpg" alt="John" style="width:100%">

          <p class="title"></p>
          <p></p>



</div>
    </div>
        </div>
    </div> -->







  </p>



<!--
    <div class="row">
          @foreach($users as $user)
        <div class="card">
            <div class="d-flex flex-wrap">
                  <div class="card-body">
                      <div class="d-flex ">
                          <div class="col-12 user">
                              <div>
                                  <h5 class="card-title "><a href="/users/{{$user->id}}"> <i class="fas fa-user-check">{{$user->name}}</i> </a></h5>
                                    {{@$user->profile->location}}
                              </div>
                              <div>
                                  <br>
                                  <p class="card-text">{{$user->email}}</p>

                              </div>
                              <div>


                                  <div><button class="btn btn-primary" >  <a href="/users/{{$user->id}}"> <span style="font-size: ; color:white; "> View Profile </span></a></button></div>

                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
            </div>
        </div>
    </div>
</div>

 -->






@endsection
