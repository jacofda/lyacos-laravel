@extends('layouts.admin')

@section('title')
Create New trilogy in other media
@stop

@section('content')

	{!!Form::open(['url' => url('the-trilogy-in-other-media'), 'class' => 'col col-sm-10'])!!}
            @include('pages.trilogy-in-other-media.form',  ['submitButtonText' => 'Create'])
    {!! Form::close() !!}

@stop