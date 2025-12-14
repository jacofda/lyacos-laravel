@extends('layouts.admin')

@section('title')
Books
@stop

@section('content')
	<div class="mb-4"><a href="{{url('books/create')}}" class="btn btn-success">Create New</a></div>
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>name</th>
				<th>edition</th>
				<th>published</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->name}}<br><small>{{$element->h2}}</small></td>
					<td>{{$element->book_edition}}</td>
					<td>{{$element->published_at->format('M Y')}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => $element->uri]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{$element->uri}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{url('books/'.$element->slug.'/edit')}}"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{url('books/'.$element->slug.'/media')}}"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop