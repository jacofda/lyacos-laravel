@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('media-appearances/'.$element->slug)])!!}

        @include('pages.appearances.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop