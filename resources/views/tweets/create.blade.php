@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/tweets"  enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" name="title"  class="form-control" value="" placeholder="Enter the title">
        </div>

        <div class="form-group">
            <label for="usr">What's happening:</label>
            <textarea name="body" rows="4" cols="50" class="form-control ckeditor"></textarea>
        </div>
        <div class="form-group">
            <label for="image">image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
    </br>
    <input type="submit" class="btn btn-primary" value="add new">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
</form>


@endsection
