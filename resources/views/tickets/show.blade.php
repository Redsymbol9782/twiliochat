@extends('layouts.dashboard')

@section('content')
    <!--<h3 class="page-title">@lang('quickadmin.tickets.title')</h3>-->

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.event')</th>
                            <td>{{ $ticket->event->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.title')</th>
                            <td>{{ $ticket->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.amount')</th>
                            <td>{{ $ticket->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.available-from')</th>
                            <td>{{ $ticket->available_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.available-to')</th>
                            <td>{{ $ticket->available_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tickets.fields.price')</th>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!--<p>&nbsp;</p>-->
			<style>
				.actions ul {
					padding: 0px 0 20px 0px;
				}
				.actions li {
				  display: inline;
				  list-style-type: none;
				  padding-right: 5px;
				  font-size: 1.2em;
				}
				
				.open-modal {
				  cursor: pointer;
				  /*color:blue;
				  font-size: 30px;*/
				}
				#mask {
				  position: fixed;
				  top: 0; left: 0;
				  width: 100%; height: 100%;
				  display: none;	
				  background: black;
				  z-index: 98;
				  opacity: 0.8;
				}
				#voicemask {
				  position: fixed;
				  top: 0; left: 0;
				  width: 100%; height: 100%;
				  display: none;	
				  background: black;
				  z-index: 98;
				  opacity: 0.8;
				}
				.modal {
				  background-color: #fff;
				  display: none;
				  position: fixed;
				  top: 45%;
				  left: 42%;
				  width: 800px;
				  height: 400px;
				  margin-left: -200px;
				  margin-top: -150px;
				  padding: 50px;
				  z-index: 99;
				  overflow-y: scroll;
				}
				.voicemodal {
					background-color: #fff;
					display: none;
					position: fixed;
					top: 38%;
					left: 42%;
					width: 800px;
					height: 500px;
					margin-left: -200px;
					margin-top: -150px;
					padding: 50px;
					z-index: 99;
				}
				
				.close-modal {
				  color:  #000;
				  text-decoration: none;
				  float: right;
				  position: absolute;
				  top: 10px;
				  right: 20px
				}
				@media (max-width : 37.500rem) {
				  .modal {
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					margin: 0;
					padding: 1.250rem
				  }
				  .voicemodal {
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					margin: 0;
					padding: 1.250rem
				  }
				  .close-modal{
					display: block;
				   position: relative;
				   padding: 5px 10px 20px 0
				  } 
				  .modal-content{
					clear: both;
					padding-right: 1.25rem
				  } 
				}
			</style>
	
			<span class="actions">
				<ul>
					<li>
						<!-- START MODAL BOX -->
						<!-- Put modal box on top to avoid z-index issue -->
						<div id="mask"></div>
						<div class="modal">
							<a class="close-modal" href="javascript:void(0)">
								<i class="fa fa-times"></i>
							</a>
							<div class='modal-content'>
								@include('tickets.chat')
							</div>
						</div>
						<!-- END MODAL BOX -->
						<span class="open-modal">
							<i class="fa fa-comments fa-1x fa-fw"></i>
						</span>
					</li>
					<li>
						<!-- START MODAL BOX -->
						<!-- Put modal box on top to avoid z-index issue -->
						<div id="voicemask"></div>
						<div class="voicemodal">
							<a class="close-modal" href="javascript:void(0)">
								<i class="fa fa-times"></i>
							</a>
							<div class='modal-content'>
								@include('tickets.voice')
							</div>
						</div>
						<!-- END MODAL BOX -->
						<span class="open-modal">
							<i class="fa fa-phone fa-1x fa-fw"></i>
						</span>
					</li>
					<li><i class="fa fa-video-camera fa-1x fa-fw"></i></li>
					<li><i class="fa fa-envelope fa-1x fa-fw"></i></li>
				</ul>
			</span>
			
			
			

            <a href="{{ route('tickets.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop