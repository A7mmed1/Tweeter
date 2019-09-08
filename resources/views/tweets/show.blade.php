@extends('layouts.app')

@section('content')
    <div class="container ">
        <table class="table table-striped">

            <tr>
                <td><img src="/storage/profile_image/{{$tweet->user->profile->profileimage}}" width="50px;"  class="rounded-circle" alt="">
                    <a href="/users/{{$tweet->user->id}}">    {{$tweet->user->name}} </a>
                <td>
                @if(!Auth::guest() && (Auth::user()->id == $tweet->user_id))
                <!-- this condition to make only the tweet onwer see the delete  and Edit buttons  -->

                <form action="/tweets/{{$tweet->id}} " method="POST">

                    @csrf

                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger" name="button">
                        Delete
                    </button>
                </td></form>
            <td>    <a class="btn btn-success" href="/tweets/{{$tweet->id}}/edit"><i class="fas fa-edit">Edit</i></a>
                @endif

            </td>
                </td>

            </tr>
            <tr>
                <td>
                     <span class="info h6"><i class="fas fa-calendar-check text-muted">{{$tweet->created_at->diffForHumans()}}</i></span>
                </td>
            </tr>
            <tr>
                <td>{{$tweet->title}}</td>
            </tr>
            <tr>
                <td>

                    <a href="/storage/tweet_image/{{$tweet->image}}"> <img src="/storage/tweet_image/{{$tweet->image}}"  width="300px" alt="photo"></a>
                </td>


            </tr>
            <tr>

                <td>{{$tweet->body}}</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex">

                        <div class="p-2">
                            <!-- like component  -->
                            <like :tweet="{{ $tweet->id }}"  :liked="{{ $tweet->liked() ? 'true' : 'false' }}" :count="{{$tweet->likes()->count()}}"></like>




                        </div>
                        <div class="p-2 mt-2">
                            <span></span>

                        </div>
                        <div class="p-2 mt-2 mr-0">
                            <h4><i class="far fa-comment-alt">Comments ({{$tweet->comments->count()}})</i></h4>



                            <!-- <a href="/tweets/{{$tweet->id}}/like" class="btn btn-primary"><i class="far fa-thumbs-up">like({{$tweet->likes()->count() }})</i></a> -->
                        </div>
                    </div>
                </td>
            </tr>

                <!-- start Comment -->

        <div class=comments>
            <tr>
                <td>Comments :</td>

            </tr>
            @foreach($tweet->comments as $comment)

            <tr>
                   <td>
                       <img src="/storage/profile_image/{{$comment->user->profile->profileimage}}" width="50px;"  class="rounded-circle" alt="">
                       <a href="/users/{{$comment->user->id}}">  {{$comment->user->name}} </a>


                   </td>
                        @if(!Auth::guest() && (Auth::user()->id == $tweet->user_id) && !Auth::guest() || (Auth::user()->id == $comment->user->id))
                    <td>  <a class="btn btn-success" href="/comments/{{$comment->id}}/edit"><i class="fas fa-edit">Edit Comment</i></a></td>
                    <td>
               <form action="/comments/{{$comment->id}}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" name="button">
                                Delete
                    </button>


                </form>
                        @endif
                   </td>
                   <td>
               <tr>
                   <td>  <p class="box pull-left">{{$comment->comment}}</p><br>
                       <a href="{{ $comment->gif }}">  <img class ="giphy" src="{{ $comment->gif }}" alt=""></a>


                       <!-- <img :src="this.selected" alt=""> -->
                          <h6 class="mb-2 text-muted">{{$comment->created_at->diffForHumans()}}</h6>
                  </td>
              </tr>
                    </td>

            @endforeach
        </table>
           <div class="panel panel-default">
               <div class="panel-heading">
               </div>
               <div class="panel-body">
                   <form class="" action="{{route('comments.store',$tweet->id)}}" method="post">
                       {{csrf_field()}}
                       <div class="form-group">
                           <label for="comment">  <i class="far fa-comment-alt">Add New comment :</i> </label>
                           <input name="comment" class="form-control form-rounded"  placeholder="Add your Comment...."><giphy
                           :value="this.selected"


                           > </giphy></input>
                           <!-- Giphy Componenet -->

                       </div>
                       <div class="form-group text-right">
                           <button type="submit"  class="btn btn-primary"  name="button">Add Comment</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>

@endsection
