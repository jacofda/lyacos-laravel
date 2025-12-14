@extends('layouts.admin')

@section('title')
Create New Publication
@stop

@section('content')

	{!!Form::open(['url' => url('publications'), 'class' => 'col col-sm-10'])!!}
            @include('pages.publications.form',  ['submitButtonText' => 'Create Publication'])
    {!! Form::close() !!}

@stop