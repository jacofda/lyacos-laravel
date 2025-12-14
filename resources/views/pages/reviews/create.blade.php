@extends('layouts.admin')

@section('title')
Create New Review
@stop

@section('content')

	{!!Form::open(['url' => url('reviews'), 'class' => 'col col-sm-10'])!!}
            @include('pages.reviews.form',  ['submitButtonText' => 'Create Review'])
    {!! Form::close() !!}

@stop