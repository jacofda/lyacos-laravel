@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('translations/'.$element->slug)])!!}

        @include('pages.translations.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop