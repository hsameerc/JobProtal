@extends('layouts')
@section('title', 'Post New Job')
@section('content')
    <div class="row">
        <h2 class="text-center">Create New Job</h2>
        <div class="col-sm-10 col-sm-offset-2">
            @include('helpers.displayMessage')
        </div>
    </div>
    <div class="row">
    {!! Form::open(array('route' => 'job-save', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <div class="form-group">
        {!! Form::label('title', 'Job Title', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('title', null, array('id' => 'title', 'class' => 'form-control', 'placeholder'   => 'Job Title','value' => '','required' => 'required',)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Your Email', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::email('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'   => 'Your Email','value' => '','required' => 'required')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Job Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, array('id' => 'description', 'class' => 'form-control', 'placeholder'   => 'Job Description', 'value' => '','required' => 'required',)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('skills', 'Job Skills', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('skills', null, array('id' => 'skills', 'class' => 'form-control', 'placeholder'   => 'Job Skills','value' => '', 'required' => 'required',)) !!}
            <span class="help-block m-b-none">Enter Your Job Skills seperated by comma (,). Eg: laravel, wordpress, mysql, git</span>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2">
            {!! Form::button('Create', array('class' => 'btn btn-primary','type' => 'submit')) !!}
            <a class="btn btn-default" href="{{ route('job-home') }}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@stop