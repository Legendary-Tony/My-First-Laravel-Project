@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Tags</h1>
		<ol class="breadcrumb">
			<li><a href="admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Tags</li>
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
						<form method="POST" action="{{ route('categories.update', $category->id) }}" >
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="col-lg-offset-3 col-lg-6 col-sm-6 col-md-6">
								<label>Categories Title</label>
								<div class="form-group">
									<input value="{{$category->name}}" class="form-control" type="text" name="name" placeholder="Categories Title">
								</div>

								<label>Categories slug</label>
								<div class="form-group">
									<input  value="{{$category->slug}}"  class="form-control" type="text" name="slug" placeholder="Categories Slug">
								</div>

								<div  class="form-group">
									<button class="btn btn-primary" value="submit" name="submit">Submit</button>
									<a class="btn btn-warning" href="{{ route('categories.index') }}">Back</a>
								</div>
							</div>

						</form>
					</div>
				</div>
				<!-- /.box -->

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