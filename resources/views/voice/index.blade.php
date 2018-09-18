@extends('layouts.guest')

@section('content')
	@include('partials.guest.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Voice Call</div>
				
                <div class="panel-body">
					@if(Session::has('success'))
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer;"><span aria-hidden="true">×</span></button>
							{{Session::get('success')}}
						</div>
					@endif
                    <form id="contactForm" role="form">
					{{ csrf_field() }}
					<div id="show_message"></div>
					<div class="form-group">
						<h3>Call Sales</h3>
						<p class="help-block">
							Are you interested in impressing your friends and
							confounding your enemies? Enter your phone number
							below, and our team will contact you right away.
						</p>
					</div>
                    <label>Your number</label>
                    <div class="form-group">
                       <input class="form-control" type="text" name="userPhone" id="userPhone"
                              placeholder="(651) 555-7889">
                    </div>
                    <label>Sales team number</label>
                    <div class="form-group">
                       <input class="form-control" type="text" name="salesPhone" id="salesPhone"
                              placeholder="(651) 555-7889">
                     </div>
					<button type="submit" class="btn btn-default">
						Contact Sales
					</button>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
