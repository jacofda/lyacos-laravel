@extends('layouts.admin')

@section('title')
Create New Book
@stop

@section('content')

	{!!Form::open(['url' => url('books'), 'class' => 'col col-sm-10'])!!}
            @include('pages.books.form',  ['submitButtonText' => 'Create Book'])
    {!! Form::close() !!}

@stop