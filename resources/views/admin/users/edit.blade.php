@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Admins</h1>
    <ol class="breadcrumb">
      <li><a href="admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">user</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
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

            <form method="POST" action="{{ route('users.update', $user->id) }}" >
              {{csrf_field()}}
              {{ method_field('PUT') }}
              <div class="col-lg-offset-2 col-lg-8 col-sm-8 col-md-8">


                <div class="form-group col-lg-12">
                  <label>Admin Name</label>
                  <input class="form-control" type="text" name="name"  value="@if (old('name')){{ old('name')}}@else{{ $user->name }} 
                  @endif">
                </div>

                <div class="form-group col-lg-12">
                  <label>Email</label>
                  <input class="form-control" type="email" name="email" placeholder="Email" value="@if (old('email')){{ old('email')}}@else{{ $user->email }} 
                  @endif" >
                </div>

                <div class="form-group col-lg-12">
                  <label>Phone Number</label>
                  <input class="form-control" type="text" name="phone_number" value="@if (old('phone_number')){{ old('phone_number')}}@else{{ $user->phone_number }} 
                  @endif">
                </div>

                <div class="form-group col-lg-12">
                  <label>Assign Role</label>
                  <div class="row">
                    @foreach ($roles as $role)
                    <div class="col-lg-3">
                      <div class="checkbox">
                        <label><input type="checkbox" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach
                          >{{ $role->name }}</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group col-lg-12">
                  <label>Status</label>
                  <div class="checkbox">
                    <label><input type="checkbox" name="status" value="1" @if (old('status') == 1 || $user->status == 1)
                      checked
                    @endif >Status </label>
                  </div>
                </div>
                
                <div  class="form-group col-lg-6">
                  <button class="btn btn-primary" value="submit" name="submit">Submit</button>
                  <a class="btn btn-warning" href="{{ route('users.index') }}">Back</a>
                </div>
              </div>

            </form>
          </div>
        </div>
        <!-- /.box -->

      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
@endsection