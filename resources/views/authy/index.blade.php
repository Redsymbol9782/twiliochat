@extends('layouts.dashboard')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">Caller Status</div>
		@if (count($errors) > 0)
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</div>
		@endif
		@if (session('status') !== null)
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ session('status') }}
			</div>
		@endif
		<div class="panel-body">
			<h1>{{ $user['name'] }}</h1>
			<p>Caller Status:
				@if($user['verified'] == 1)
					Verified
				@else
					Not Verified
				@endif
			</p>
			@if($user['verified'] == 0)
				<p>
				  <a href="{{ url('user_verify') }}">Verify your account now</a>
				</p>
			@endif
			
		</div>
	</div>
       
@endsection
