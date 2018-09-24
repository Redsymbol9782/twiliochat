<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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

<script>
$(function(){
	$('#contactForm').on('submit', function(e) {
        // Prevent submit event from bubbling and automatically submitting the
        // form
        e.preventDefault();
        var base_path = "<?php echo config('app.url');?>";
        // Call our ajax endpoint on the server to initialize the phone call
        $.ajaxSetup({ 
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')} 
		});
        $.ajax({
            url: base_path+'/voice/call',
            method: 'POST',
            dataType: 'json',
            data: {
                userPhone: $('#userPhone').val(),
                salesPhone: $('#salesPhone').val()
            }
        }).done(function(data) {
            // The JSON sent back from the server will contain a success message
            alert(data.message);
        }).fail(function(error) {
            alert(JSON.stringify(error));
        });
	});
});
</script>