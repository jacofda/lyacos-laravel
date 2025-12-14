@extends('layouts.admin')

@section('title')
Excerpts
@stop

@section('content')
	<div class="mb-4"><a href="{{url('excerpts/create')}}" class="btn btn-success">Create New</a></div>
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>name</th>
				<th>book</th>
				<th>language</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->name}}</td>
					<td>{{$element->book->name}}</td>
					<td>{{$element->language->name}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => url('excerpts/'.$element->slug)]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{url('books/excerpts/'.$element->slug)}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{url('excerpts/'.$element->slug.'/edit')}}"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{url('excerpts/'.$element->slug.'/media')}}"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop


