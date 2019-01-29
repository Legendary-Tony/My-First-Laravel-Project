<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('user/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/blog-home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/clean-blog-min.css') }}">
	<title>@yield('title')</title>
    @section('head')
        @show
</head>
<body>

	@yield('content')
	
	@include('user.footer')
</body>
</html>