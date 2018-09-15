@extends('layouts.guest')

@section('content')
    @include('partials.guest.header')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="content">
							<div class="title m-b-md">
								@if (Auth::check())
									Customer Dashboard
								@else
									Guest Dashboard
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection