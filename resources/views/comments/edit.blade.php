@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/comments/{{$comment->id}}" method="post">
        @csrf
        {{ method_field('PUT') }}


        <div class="form-group">
            <label for="usr"></label>
            <input name="comment" class="form-control form-rounded"  placeholder="Add your Comment...."><giphy
            :value="this.selected"


            > </giphy></input>
        </div>
            </br>
        <div class="form-group text-right">

            <input type="submit" class="btn btn-primary mt-4" value="Update">
        </div>
@endsection
