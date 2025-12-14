@extends('layouts.admin')

@section('title')
Translatio
@stop

@section('content')
	<div class="mb-4"><a href="{{url('translations/create')}}" class="btn btn-success">Create New</a></div>
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>eng book</th>
				<th>name</th>
				<th>lang</th>
				<th>published</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->book->name}}</td>
					<td>{{$element->name}}</td>
					<td>{{$element->language->name}}</td>
					<td>{{$element->published_at->format('M Y')}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => url('translations/'.$element->slug)]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{$element->uri}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{url('translations/'.$element->slug)}}/edit"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{url('translations/'.$element->slug)}}/media"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop