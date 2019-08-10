@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/users" method="post">
        {{csrf_field()}}



        <div class="form-group">
            <label for="usr">location:</label>
            <input type="text" name="location"  class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="usr">birthday:</label>
            <input type="text" name="birthday"  class="form-control" value="">
        </div>

        <div class="form-group">
            <label for="usr">bio:</label>
            <textarea name="bio" rows="4" cols="50" class="form-control ckeditor"></textarea>
        </div>
    </br>
    <input type="submit" class="btn btn-primary" value="add new">


@endsection
