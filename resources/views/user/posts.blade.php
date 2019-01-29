@extends('user/layouts.app')

@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('user/css/prism.css') }}">
@endsection

@section('content')

@include('user.inc.post_navbar')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=330689440687969&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
  <div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8 col-md-8">

      <!-- Title -->
      <h1 class="mt-4">{!! $post->title !!}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">Start Bootstrap</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p class="float-left">Posted {{ $post->created_at->diffForHumans() }}</p>
      
      {{-- Category --}}
      <p class="float-right">On
        @foreach($post->categories as $category)
        <a style="text-decoration: none;" href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
        @endforeach
      </p>
      
      
      <hr>

      <!-- Preview Image -->
      <img style="width: 728px; height: 300px;" src="{{Storage::disk('s3')->url($post->image)}}">

      <hr>
      {!! $post->body !!}
      <hr>

      {{-- Tags Area --}}
      <h4>Tag Cloud</h4>
      @foreach($post->tags as $tag)
      <a style="text-decoration: none;" href=""><p class="float-left" style="margin-right: 10px; margin-top: 0px; border-radius: 800px; border: 1px solid gray; padding: 5px;" >
        {{ $tag->name }}
      </p></a>
      @endforeach

      <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="7"></div>
    </div>
    @include('user.inc.sidebar')
  </div>
</div>
@endsection
@section('footer')
  <script src="{{ asset('user/js/prism.js') }}"></script>
@endsection
