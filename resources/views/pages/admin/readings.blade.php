@extends('layouts.admin')

@section('title')
Readings and Events
@stop

@section('content')
	<div class="mb-4"><a href="{{url('readings/create')}}" class="btn btn-success">Create New</a></div>
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>name</th>
				<th>location</th>
				<th>start</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->name}}</td>
					<td>{{$element->location}}</td>
					<td>{{$element->published_at->format('d/m/Y')}} {{$element->start_at_hour}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => url('readings/'.$element->slug)]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{$element->reading_slug}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{url('readings/'.$element->slug.'/edit')}}"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{url('readings/'.$element->slug.'/media')}}"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop


