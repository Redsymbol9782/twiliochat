@extends('layouts.guest')

@section('content')
	@include('partials.guest.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">IVR</div>
				
                <div class="panel-body">
					@if(Session::has('success'))
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer;"><span aria-hidden="true">×</span></button>
							{{Session::get('success')}}
						</div>
					@endif
                    Call the number you have configured under the
					<a href='https://www.twilio.com/user/account/phone-numbers/incoming'>
					Manage Numbers page in your Twilio account</a> or head to this
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</html>
