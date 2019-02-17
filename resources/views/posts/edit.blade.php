@extends('layouts.master')

@section('content')

<div class="row">
    <div class="container">
        <h2>Edit is create page</h2>
        <form action="{{'/posts/' . $post->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="create" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
@endsection