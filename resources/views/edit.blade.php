@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/users/{{@$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="usr">location:</label>
            <input type="text" name="location"  class="form-control" value="{{@$user->profile->location}}">
        </div>
        <div class="form-group">
            <label for="usr">birthday:</label>
            <input type="text" name="birthday"  class="form-control" value="{{@$user->profile->birthday}}" placeholder="1990-08-12">
        </div>

        <div class="form-group">
            <label for="usr">bio:</label>
            <input type="text" name="bio"  class="form-control" value="{{@$user->profile->bio}}">

        </div>
        <div class="form-group">
            <label for="profileimage">image:</label>
            <input type="file" name="profileimage" class="form-control-file" id="profileimage">
        </div>
    </br>
            <input type="submit" class="btn btn-primary" value="update">

@endsection
