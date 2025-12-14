@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('the-trilogy-in-other-media/'.$element->slug)])!!}

        @include('pages.trilogy-in-other-media.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop