@extends('layouts.dashboard')

@section('content')
    <!--<h3 class="page-title">@lang('quickadmin.permissions.title')</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['permissions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
	<a href="{{ route('permissions.index') }}" class="btn btn-default" style="float:right;">@lang('quickadmin.qa_back_to_list')</a>
    {!! Form::close() !!}
@stop

