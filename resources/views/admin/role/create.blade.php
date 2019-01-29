@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Role</h1>
		<ol class="breadcrumb">
			<li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Role</li>
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

						<form method="POST" action="{{ route('role.store') }}" >
							{{csrf_field()}}
							<div class="col-lg-offset-3 col-lg-6 col-sm-6 col-md-6">
								<div class="col-lg-12">
									<label>Role Name</label>
									<div class="form-group">
										<input class="form-control" type="text" name="name" placeholder="Role Name">
									</div>
								</div>

								<div class="col-lg-4">
									<label>Posts Permission</label>
									@foreach ($permissions  as $permission)
									@if ($permission->for == 'Post')
									<div class="checkbox">
										<label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
									</div>
									@endif
									@endforeach									
								</div>

								<div class="col-lg-4">
									<label>Users Permissions</label>
									@foreach ($permissions  as $permission)
									@if ($permission->for == 'User')
									<div class="checkbox">
										<label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
									</div>
									@endif
									@endforeach
								</div>

								<div class="col-lg-4">
									<label>Users Permissions</label>
									@foreach ($permissions  as $permission)
									@if ($permission->for == 'Other')
									<div class="checkbox">
										<label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
									</div>
									@endif
									@endforeach
								</div>
								
								<div class="col-lg-12">
									<div  class="form-group">
										<button class="btn btn-primary" value="submit" name="submit">Submit</button>
										<a class="btn btn-warning" href="{{ route('role.index') }}">Back</a>
									</div>
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