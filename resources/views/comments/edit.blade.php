@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/comments/{{$comment->id}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}


        <div class="form-group">
            <label for="usr"></label>
            <input name="comment" class="form-control form-rounded"  value="{{$comment->comment}}"><giphy
            :value="this.selected"


            > </giphy></input>
        </div>
        <div class="form-group pull-right p-4">
            <label for="photo">image:</label>
            <input type="file" name="photo" class="form-control-file" id="photo">
        </div>

            </br>
        <div class="form-group text-right">

            <input type="submit" class="btn btn-primary mt-4" value="Update">
        </div>
@endsection
