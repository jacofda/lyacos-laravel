@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('publications/'.$element->slug)])!!}

        @include('pages.publications.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop