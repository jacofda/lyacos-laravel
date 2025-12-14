@extends('layouts.admin')

@section('title')
Create New Reading
@stop

@section('content')

	{!!Form::open(['url' => url('readings'), 'class' => 'col col-sm-10'])!!}
            @include('pages.readings.form',  ['submitButtonText' => 'Create Reading'])
    {!! Form::close() !!}

@stop