@extends('admin.layouts.app')

@section('headcontent')
<link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tags Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tags</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>
        <a class="col-lg-offset-5 btn btn-success" href="{{ route('tags.create') }}">Add New</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
        </div>
      </div>
    
      <div class="box">
        @include('messages.message')
        <!-- /.box-header -->
        <div class="box-body">
          
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Tag Name</th>
                <th>Slug</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$tag->name}}
                </td>
                <td>{{$tag->slug}}</td>
                <td> <a class="btn btn-primary" href="{{ route('tags.edit', $tag->id) }}">Edit</a></td>
                <td><form id="form-data-{{$tag->id}}" action='{{ route('tags.destroy', $tag->id) }}' method='post' style="display: none;">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                    </form>
                    <a class="btn btn-danger" href="" onclick="if (confirm('Are you sure you want to delete this?')) {
                      event.preventDefault();
                      document.getElementById('form-data-{{$tag->id}}').submit();
                    } else {
                      event.preventDefault();}">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>S/N</th>
                <th>Tag Name</th>
                <th>Slug</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </tfoot>
          </table>
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footercontent')
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection