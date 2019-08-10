@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/comments/{{$comment->id}}" method="post">
        @csrf
        {{ method_field('PUT') }}







        <div class="form-group">
            <label for="usr"></label>
            <textarea name="comment" rows="4" cols="50" class="form-control ckeditor">{{$comment->comment}}</textarea>
        </div>
    </br>
    <input type="submit" class="btn btn-primary" value="update">

@endsection
