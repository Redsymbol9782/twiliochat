<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials.head')
	</head>
	<body class="hold-transition skin-blue sidebar-mini">

		<div class="wrapper">
			@include('partials.topbar')
			@include('partials.sidebar')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>{{$title}}</h1>
					<ol class="breadcrumb">
						<li><a href="{{URL::asset('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">{{$title}}</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					@if (Session::has('message'))
						<div class="note note-info">
							<p>{{ Session::get('message') }}</p>
						</div>
					@endif
					@if ($errors->count() > 0)
						<div class="note note-danger">
							<ul class="list-unstyled">
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					@yield('content')
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			
			@include('partials.footer')
			
		</div>
		
		@include('partials.javascripts')
		
	</body>
</html>