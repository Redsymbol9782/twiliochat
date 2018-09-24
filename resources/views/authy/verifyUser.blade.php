@extends('layouts.dashboard')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">Verification</div>
		
		<div class="panel-body">
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
			
			<h1>Just To Be Safe...</h1>
			<p>
				Your account has been created, but we need to make sure you're a human
				in control of the phone number you gave us. Can you please enter the
				verification code we just sent to your phone?
			</p>
			{!! Form::open(['url' => url('user_verify')]) !!}
				<div class="form-group">
					{!! Form::label('token') !!}
					{!! Form::text('token', '', ['class' => 'form-control']) !!}
				</div>
				<button type="submit" class="btn btn-primary">Verify Token</button>
			{!! Form::close() !!}

			<hr>
			{!! Form::open(['url' => url('user_verify_resend')]) !!}
				<button type="submit" class="btn">Resend code</button>
			{!! Form::close() !!}
			
		</div>
	</div>
       
@endsection
