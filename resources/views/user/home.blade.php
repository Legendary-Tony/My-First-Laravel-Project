@extends('user/layouts.app')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
  .fa-thumbs-up:hover{
    color: red;
  }
  a{
    text-decoration: none;
  }
</style>
@endsection
@section('content')
@include('user.inc.navbar')
<!-- Page Content -->
<div class="container">
  <div class="row" id="app">
    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">LATEST POST</h1>

      <!-- Blog Post -->

      @foreach($posts as $post)
      <div class="card mb-4">

        <img style="width: 728px; height: 300px;" src="{{Storage::disk('s3')->url($post->image)}}">
        <div class="card-body">
          <h2 class="card-title"><a style="text-decoration: none;" href="{{ route('posts', $post->slug) }}">{{$post->title}}</a></h2>
          <p class="card-text">{!! str_limit($post->body, 100, '...')  !!}</p>
          <a href="{{ route('posts', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted {{$post->created_at->diffForHumans() }} by
          <a href="#">Legendary</a> 
          <a style="text-decoration: none;" href="">
            <small>0</small>
            <i class="fas fa-thumbs-up"></i>
          </a> 
        </div>
      </div>
      @endforeach


      <!-- Pagination -->

      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
         {{ $posts->links() }}
       </li>
     </ul>

   </div>
   @include('user.inc.sidebar')
 </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/app.js') }}"></script>
@endsection