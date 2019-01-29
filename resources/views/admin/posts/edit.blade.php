@extends('admin.layouts.app')

@section('headcontent')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors

    </h1>
    <ol class="breadcrumb">
      <li><a href="admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Editor
              <small>Write Your article here</small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>

            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->




          <div class="box-body pad">
            @include('messages.message')
            <form method="POST" action="{{ route('posts.update', $posts->id) }}" enctype="multipart/form-data" >
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="col-lg-6 col-sm-6 col-md-6">
                <label>Title</label>
                <div class="form-group">
                  <input value="{{$posts->title}}" class="form-control" type="text" name="title" placeholder="Psot Title">
                </div>

                <label>slug</label>
                <div class="form-group">
                  <input value="{{$posts->slug}}" class="form-control" type="text" name="slug" placeholder="Psot Title">
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <label>Select Tags</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%; background: blue;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                      @foreach($posts->tags as $PostTag)
                      @if($PostTag->id == $tag->id)
                      selected
                      @endif
                      @endforeach>{{$tag->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Categories</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%; background: blue;" tabindex="-1" aria-hidden="true" name="categories[]">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" 
                        @foreach($posts->categories as $PostCategory)
                        @if($PostCategory->id == $category->id)
                        selected
                        @endif
                        @endforeach>
                        {{$category->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <div class="pull-left">
                      <label>Upload File</label>
                      <input type="file" name="image" value="{{ $posts->image }}">
                    </div>

                    <div class="checkbox pull-right">
                      <label>
                        <input type="checkbox" name="status" value="1" @if($posts->status == 1) {{'checked'}} @endif> Publish 
                      </label>
                    </div>
                  </div>




                </div>

              </div>
            </div>
            <!-- /.box -->

            <!-- /.box-header -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"></h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <label>Text Area</label>
                <div  class="form-group">
                  <textarea style="margin-top: 500px;" id=body" name="body" class="textarea form-control" placeholder="Place some text here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$posts->body}}</textarea>
                </div>

                <div  class="form-group">
                  <button class="btn btn-primary" value="submit" name="submit">Submit</button>
                  <a class="btn btn-warning" href="{{ route('posts.index') }}">Back</a>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
<!-- /.content -->
</div>
@endsection
@section('footercontent')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace( 'body' );
  </script>
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2()
  });
</script>
@endsection