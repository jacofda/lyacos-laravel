@extends('layouts.admin')

@section('title')
Create New Media Appearance
@stop

@section('content')

	{!!Form::open(['url' => url('media-appearances'), 'class' => 'col col-sm-10'])!!}
            @include('pages.appearances.form',  ['submitButtonText' => 'Create Media Appearance'])
    {!! Form::close() !!}

@stop