<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Video Chat Rooms</div>
                <div class="panel-body">
					<!--@if (Route::has('login'))
							@auth
								<a href="{{ url('/') }}">Home</a>
							@else
								<a href="{{ url('login') }}">Login</a>
								<a href="{{ url('register') }}">Register</a>
							@endauth
					@endif-->
				
					{!! Form::open(['url' => 'room/create']) !!}
					{!! Form::label('roomName', 'Create or Join a Video Chat Room') !!}
					{!! Form::text('roomName') !!}
					{!! Form::submit('Go') !!}
				    {!! Form::close() !!}
					
					
					
                    
                </div>
            </div>
        </div>
    </div>
</div>
