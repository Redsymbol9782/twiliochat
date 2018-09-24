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
                            <th>@lang('quickadmin.calllog.fields.sid')</th>
                            <td>{{ $calllog->sid or 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calllog.fields.created_at')</th>
                            <td>{{ $calllog->dateCreated or 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calllog.fields.parent_call_sid')</th>
                            <td>{{ $calllog->parentCallSid or 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calllog.fields.account_sid')</th>
                            <td>{{ $calllog->accountSid or 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calllog.fields.to')</th>
                            <td>{{ $calllog->to or 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calllog.fields.from')</th>
                            <td>{{ $calllog->from or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.phone_number_sid')</th>
                            <td>{{ $calllog->phoneNumberSid or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.status')</th>
                            <td>{{ $calllog->status or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.start_time')</th>
                            <td>{{ $calllog->startTime or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.end_time')</th>
                            <td>{{ $calllog->endTime or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.duration')</th>
                            <td>{{ $calllog->duration or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.price')</th>
                            <td>{{ $calllog->price or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.price_unit')</th>
                            <td>{{ $calllog->priceUnit or 'N/A'}}</td>
                        </tr>
					</table>
                </div>
				<div class="col-md-6">
                    <table class="table table-bordered table-striped">
						<tr>
                            <th>@lang('quickadmin.calllog.fields.direction')</th>
                            <td>{{ $calllog->direction or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.answered_by')</th>
                            <td>{{ $calllog->answeredBy or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.annotation')</th>
                            <td>{{ $calllog->annotation or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.api_version')</th>
                            <td>{{ $calllog->apiVersion or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.forwarded_from')</th>
                            <td>{{ $calllog->forwardedFrom or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.group_sid')</th>
                            <td>{{ $calllog->groupSid or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.caller_name')</th>
                            <td>{{ $calllog->callerName or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.uri')</th>
                            <td>{{ $calllog->uri or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.notifications')</th>
                            <td>{{ $calllog->notifications or 'N/A'}}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.calllog.fields.recordings')</th>
                            <td>{{ $calllog->recordings or 'N/A' }}</td>
                        </tr>
					</table>
				</div>
            </div>

            <a href="{{ route('calllogs.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop