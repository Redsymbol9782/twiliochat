<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Send Message</div>
				
                <div class="panel-body">
					@if(Session::has('success'))
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer;"><span aria-hidden="true">×</span></button>
							{{Session::get('success')}}
						</div>
					@endif
                    <form class="form-horizontal" method="POST" action="{{ URL::asset('sms') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('to') ? 'has-error' : '' }}">
                            <label for="to" class="col-md-4 control-label">To</label>

                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control" name="to" value="{{ old('to') }}" required autofocus placeholder="mobile number with country code">

                                @if ($errors->has('to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                  

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">Body</label>

                            <div class="col-md-6">
                                <!--<input id="body" type="password" class="form-control" name="body" required>-->
								<textarea name="body" id="body" class="form-control" required placeholder="the body of the text message you'd like to send"></textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript') 
    <script>
		@if(Session::has('success'))
			swal('Success','{{Session::get('success')}}','success');
		@endif
	</script>
@endsection