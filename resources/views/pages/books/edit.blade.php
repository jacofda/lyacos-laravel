@extends('layouts.admin')

@section('title')
Edit {{$element->name}}
@stop

@section('content')

    {!!Form::model($element, ['method' => 'PATCH', 'class' => 'col col-sm-10', 'url' => url('books/'.$element->slug)])!!}

        @include('pages.books.form',  ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

@stop