@extends('layouts.admin')

@section('title')
Contacts
@stop

@section('content')
	<table class="table table-sm ">
		<thead>
			<tr>
				<th>name</th>
				<th>message</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td>{{$element->name}}<br><small>{{$element->email}} - {{$element->created_at->format('d/m/Y')}}</small></td>
					<td>{{$element->message}}</td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => url('contacts/'.$element->id)]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop
