@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/tweets/{{ $tweet->id }}" enctype="multipart/form-data" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                    <label for="usr">Title:</label>
                    <input type="text" name="title"  class="form-control" value="{{$tweet->title}}">
            </div>

            <div class="form-group">
                    <label for="usr">Body:</label>
                    <textarea name="body" rows="4" cols="50" class="form-control ckeditor"> {{$tweet->body}} </textarea>
            </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            </br>
                    <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@endsection
