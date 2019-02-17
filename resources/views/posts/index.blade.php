@extends('layouts.master')

@section('content')
   <h2>This is list of posts</h2>
   <hr>
   <div class="row">
      <div class="col-md-9">
         <div class="row">
               @foreach ($posts as $post)
               <div class="col-md-4">
                  <div class="card mb-3" style="max-width: 18rem">
                    <img src="{{asset('storage/coverImages/' . $post->image)}}" alt="" width="100%" height="200">

                     <div class="card-header bg-dark text-white">
                           {{$post->title}}
                     </div>
                     <div class="card-body">
                        <div class="card-title">
                           <h4>{{$post->title}}</h4>
                        </div>
                        <div class="card-text">
                           {{$post->body}}
                        </div>
                        <hr>
                        <a href="{{'/posts/' . $post->id}}" class="btn btn-primary">show more</a>
                     </div>
                  </div>
               </div>
               @endforeach

         </div>
      </div>
      <div class="col-md-3">
         <div class="card mb3" style="max-width: 18rem;">
            <div class="card-header bg-info text-white">stats.</div>
            <div class="card-body">
            <p class="card-text">The number of posts is { {{$count}} }</p>
            </div>
         </div>
      </div>

   </div>
   {{-- pagination --}}
   <div class="row">
      <div class="col-md-12 d-flex justify-content-center">
         {{$posts->links()}}
      </div>
   </div>
@endsection