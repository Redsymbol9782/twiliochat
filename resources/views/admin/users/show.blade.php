@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
						<tr>
                            <th>@lang('quickadmin.users.fields.first_name')</th>
                            <td>{{ $user->first_name }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.last_name')</th>
                            <td>{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.area_code')</th>
                            <td>{{ $user->area_code }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.phone')</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.location')</th>
                            <td>{{ $user->location }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or 'N/A' }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.agent_type')</th>
                            <td>{{ $user->agentType->title or 'N/A' }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.users.fields.support')</th>
                            <td>{{ $user->support->title or 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop