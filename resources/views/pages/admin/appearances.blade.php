@extends('layouts.admin')

@section('title')
Media Appearances
@stop

@section('content')
	<div class="mb-4"><a href="{{url('media-appearances/create')}}" class="btn btn-success">Create New</a></div>
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>name</th>
				<th>location</th>
				<th>type</th>
				<th>data</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->name}}<br><small>{{$element->h2}}</small></td>
					<td>{{$element->location}}</td>
					<td>{{$element->type}}</td>
					<td>{{$element->published_at->format('M Y')}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => $element->uri]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{$element->uri}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{$element->uri}}/edit"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{$element->uri}}/media"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop