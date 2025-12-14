@extends('layouts.admin')

@section('title')
Reviews
@stop

@section('content')
	<div class="mb-4"><a href="{{url('reviews/create')}}" class="btn btn-success">Create New</a></div>
	<div class="mb-4"><a target="_blank" href="{{url('reviews')}}" class="btn btn-primary">See Reviews</a></div>
	<table class="table table-sm table-hover sortable-table">
		<thead>
			<tr>
				<th><abbr title="change the order by hold left click and drag to position">order</abbr></th>
				<th>name</th>
				<th>belong to book</th>
				<th>lang</th>
				<th>published</th>
				<th style="width:148px;"></th>
				<th class="d-none"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($elements as $element)
				<tr>
					<td class="align-middle text-center handler">{{$loop->iteration}}</td>
					<td>{{$element->name}}<br><small>{{$element->h2}}</small></td>
					<td><small>
						@foreach($element->books as $book)
							@if($loop->last)
								{{$book->name}}
							@else
								{{$book->name}} -
							@endif
						@endforeach
						</small>
					</td>
					<td><small>{{$element->language->format_639_1}}</small></td>
					<td><small>{{$element->published_at->format('M Y')}}</small></td>
					<td>
						{!! Form::open(['method' => 'delete', 'url' => $element->uri]) !!}
							<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							<a class="btn btn-primary btn-sm" href="{{$element->uri}}"><i class="fa fa-eye"></i></a>
							<a class="btn btn-success btn-sm" href="{{$element->uri}}/edit"><i class="fa fa-edit"></i></a>
							<a class="btn btn-warning btn-sm" href="{{$element->uri}}/media"><i class="fa fa-image"></i></a>
						{!! Form::close() !!}
					</td>
					<td class="d-none">{{$element->id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop

@section('scripts')
<script>
    (function(){
        $('.sortable-table').sortable({
            containerSelector: 'table',
            itemPath: '> tbody',
            itemSelector: 'tr',
            placeholder: '<tr class="placeholder"/>',
            handle: 'td.handler',

            onDrop: function ($item, container, _super) {
                var tableData = $('.table tbody tr');
                var arr = {
                    '_token': '{{csrf_token()}}',
                    'model_order': []
                }
                $.each(tableData, function(index, value){
                    id = $(value).children('td:last-child').text();
                    arr.model_order.push(id);
                });          
                $.post( "{{url('admin/sorting/'.$elements->first()->directory)}}", arr, function( data ) {
                  toastr.info(data);
                  //console.log(data);
                });
                _super($item, container);
            }
        });
        
    })(jQuery);
</script>
@stop