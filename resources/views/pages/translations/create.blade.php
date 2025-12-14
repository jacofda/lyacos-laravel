@extends('layouts.admin')

@section('title')
Create New Translation
@stop

@section('content')

	{!!Form::open(['url' => url('translations'), 'class' => 'col col-sm-10'])!!}
            @include('pages.translations.form',  ['submitButtonText' => 'Create Translation'])
    {!! Form::close() !!}

@stop