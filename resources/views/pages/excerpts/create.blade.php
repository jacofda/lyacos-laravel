@extends('layouts.admin')

@section('title')
Create New Excerpts
@stop

@section('content')

	{!!Form::open(['url' => url('excerpts'), 'class' => 'col col-sm-10'])!!}
            @include('pages.excerpts.form',  ['submitButtonText' => 'Create Excerpts'])
    {!! Form::close() !!}

@stop