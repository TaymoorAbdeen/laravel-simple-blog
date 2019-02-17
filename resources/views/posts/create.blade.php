@extends('layouts.master')

@section('content')

<div class="row">
    <div class="container">
        <h2>this is create page</h2>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            
            

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="coverImage" id="coverImage" class="form-control-file">
            </div>

            <div class="form-group">
                <button type="submit" name="create" class="btn btn-primary">Create</button>
            </div>
            


        </form>
    </div>
</div>
@endsection