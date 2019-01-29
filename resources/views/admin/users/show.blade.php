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
      Admin Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Admin</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>
        @can('posts.user', Auth::user())      
        <a class="col-lg-offset-5 btn btn-success" href="{{ route('users.create') }}">Add New</a>
        @endcan
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
                <th>User Name</th>
                <th>Roles Assigned</th>
                <th>Status</th>
                @can('posts.userEdit', Auth::user())
                <th>Edit</th>
                @endcan
                @can('posts.userDelete', Auth::user())
                <th>Delete</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$user->name}}</td>
                <td>@foreach ($user->roles as $role)
                  {{ $role->name }},
                @endforeach</td>
                <td>{{$user->status? 'Active' : 'Not Active'}}</td>

                @can('posts.userEdit', Auth::user())
                <td> <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                </td>
                @endcan
                
                @can('posts.userDelete', Auth::user())
                <td><form id="form-data-{{$user->id}}" action='{{ route('users.destroy', $user->id) }}' method='post' style="display: none;">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                </form>
                <a class="btn btn-danger" href="" onclick="if (confirm('Are you sure you want to delete this?')) {
                  event.preventDefault();
                  document.getElementById('form-data-{{$user->id}}').submit();
                } else {
                  event.preventDefault();}">Delete</a>
                </td>
                @endcan
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>S/N</th>
                <th>User Name</th>
                <th>Roles Assigned</th>
                <th>Status</th>
                @can('posts.userEdit', Auth::user())
                <th>Edit</th>
                @endcan
                @can('posts.userDelete', Auth::user())
                <th>Delete</th>
                @endcan
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