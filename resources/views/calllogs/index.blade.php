@extends('layouts.dashboard')

@section('content')
    <p>
        <a onclick="swal('Please Wait...!','Getting latest call logs...!','warning')" href="{{ url('calllog_refresh') }}" class="btn btn-success">@lang('quickadmin.qa_refresh')</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($calllogs) > 0 ? 'datatable' : '' }} @can('calllog_delete') dt-select @endcan">
                <thead>
                    <tr>
						<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
                        
                        <!--<th>@lang('quickadmin.calllog.fields.sid')</th>-->
                        <th>@lang('quickadmin.calllog.fields.to')</th>
                        <th>@lang('quickadmin.calllog.fields.from')</th>
                        <th>@lang('quickadmin.calllog.fields.status')</th>
                        <th>@lang('quickadmin.calllog.fields.direction')</th>
                        <th>@lang('quickadmin.calllog.fields.created_at')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if(count($calllogs) > 0)
                        @foreach($calllogs as $calllog)
                            <tr data-entry-id="{{ $calllog->id }}">
								<!--<td></td>-->
                                <!--<td>{{ $calllog['sid'] or 'N/A' }}</td>-->
                                <td>{{ $calllog['to'] or 'N/A'}}</td>
                                <td>{{ $calllog['from'] or 'N/A'}}</td>
                                <td>{{ $calllog['status'] or 'N/A'}}</td>
                                <td>{{ $calllog['direction'] or 'N/A' }}</td>
                                <td>{{ $calllog['dateCreated'] or 'N/A'}}</td>
                                <td>
                                    @can('calllog_view')
                                    <a href="{{ route('calllogs.show',[$calllog->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
									{!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('ticket_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tickets.mass_destroy') }}';
        @endcan
		
		@if(Session::has('success'))
			swal('Succuss','{{Session::get('success')}}','success');
		@endif
    </script>
@endsection