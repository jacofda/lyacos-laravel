@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('readings/'.$element->slug)])!!}

        @include('pages.readings.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop