@extends('layouts.app')

@section('content')
<!-- <div class="row">

<div class="col-md-8"> -->


<a  href="/tweets/create" class="st btn rounded-circle m-3">Add New Tweet</a>

    <div class="container text-center">
        <table class="table table-striped">
            <tr>
                <td><a href="#"><i class="fab fa-twitter">Tweets</i></a></td>
            </tr>
                @foreach($tweets as $tweet)
            <tr>
                <td> <img src="/storage/profile_image/{{$tweet->user->profile->profileimage}}" width="100px;"  class="rounded-circle" alt="">

                    <h4 class="li"><a  href="/users/{{@$tweet->user->id}}"> <i style="color:#3490DC;"class="fas fa-check-circle">{{@$tweet->user->name}}</i></a></h4>
                    <h5>Title : <a href="/tweets/{{ $tweet->id }}"> <i class="far fa-eye">{{$tweet->title}}</i></a></h5>
                    <br>
                    <a href="/storage/tweet_image/{{$tweet->image}}">   <img src="/storage/tweet_image/{{$tweet->image}}" width="300px" alt="photo"></a>
                    <br>

                    <i class="far fa-thumbs-up " style="color:#3490DC">like({{$tweet->likes()->count() }})</i>
                    <i class="far fa-comment-alt" style="color:#3490DC">Comment ({{$tweet->comments->count()}})</i>
                    <small class="h6">
                    <span class="info p-2"><i class="fas fa-calendar-check text-muted">{{$tweet->created_at->diffForHumans()}}</i></span>
                    </small>

                </td>
            </tr>
            <tr>
                <td>    @if(!Auth::guest() && (Auth::user()->id == $tweet->user_id))</td>
                <!-- this condition to make only the tweet onwer see the delete  and Edit buttons  -->

                <td>
                    <form action="/tweets/{{$tweet->id}} " method="POST">

                        @csrf

                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger" name="button">
                            Delete
                        </button>
                    </form>

                </td>
                <td>
                    <a class="btn btn-success" href="/tweets/{{$tweet->id}}/edit"><i class="fas fa-edit">Edit</i></a>

                </td>
                @endif

            </tr>
            @endforeach
            <!-- Pagination -->
            <td>{{$tweets->links()}}</td>
        </table>

    </div>
    </div>
    
</div>



@endsection
