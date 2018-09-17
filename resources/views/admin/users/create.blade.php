@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('first_name', 'First Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif
                </div>
				<div class="col-xs-6 form-group">
                    {!! Form::label('last_name', 'Last Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('area_code', 'Area Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('area_code', old('area_code'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('area_code'))
                        <p class="help-block">
                            {{ $errors->first('area_code') }}
                        </p>
                    @endif
                </div>
				<div class="col-xs-6 form-group">
                    {!! Form::label('phone', 'Phone*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
				<div class="col-xs-6 form-group">
                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('location', 'Location*', ['class' => 'control-label']) !!}
                    {!! Form::text('location', old('location'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>
				<div class="col-xs-6 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('agent_type_id', 'Agent Type*', ['class' => 'control-label']) !!}
                    {!! Form::select('agent_type_id', $agent_types, old('agent_type_id'), ['class' => 'form-control select2', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('agent_type_id'))
                        <p class="help-block">
                            {{ $errors->first('agent_type_id') }}
                        </p>
                    @endif
                </div>
				<div class="col-xs-6 form-group">
                    {!! Form::label('support_id', 'Support*', ['class' => 'control-label']) !!}
                    {!! Form::select('support_id', $supports, old('support_id'), ['class' => 'form-control select2', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('support_id'))
                        <p class="help-block">
                            {{ $errors->first('support_id') }}
                        </p>
                    @endif
                </div>
            </div>
			
		</div>
    </div>
	{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
	<a href="{{ route('admin.users.index') }}" class="btn btn-default" style="float:right;">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop

