@extends('layouts.admin')

@section('content')

    <div class="card text-center" style="width: 20rem;">
        <div class="card-header">
            Clear View Cache
        </div>
        <div class="card-body">
            {!! Form::open([url('admin/clear-view-cache')]) !!}
                <button type="submit" class="btn btn-sm btn-primary clear-view">Clear View</button>
                <small class="form-text text-muted">Some data are cached for 7 days. If you do an update and you wnat to see the changings immidiatly clear the cache</small>
            {!! Form::close() !!}
        </div>
    </div>


    <div class="card text-center" style="width: 20rem;">
        <div class="card-header">
            Clear Data Cache
        </div>
        <div class="card-body">
            {!! Form::open([url('admin/clear-data-cache')]) !!}
                <button type="submit" class="btn btn-sm btn-primary clear-data">Clear Data</button>
                <small class="form-text text-muted">Some data are cached for 7 days. If you do an update and you wnat to see the changings immidiatly clear the cache</small>
            {!! Form::close() !!}
        </div>
    </div>
       
    <div class="card text-center" style="width: 20rem;">
        <div class="card-header">
            Config Cache
        </div>
        <div class="card-body">
            {!! Form::open([url('admin/clear-config-cache')]) !!}
                <button type="submit" class="btn btn-sm btn-primary config-cache">Clear Config Cache</button>
                <small class="form-text text-muted">If some enviroment variables are still around clear confing cache</small>
            {!! Form::close() !!}
        </div>
    </div>


@endsection

@section('scripts')
<script>
    $('button.clear-view').on('click', function(e){
        e.preventDefault();
        var arr = {'_token': '{{csrf_token()}}'};
        $.post( "{{url('admin/clear-view-cache')}}", arr, function(data){
            toastr.info(data);
        }); 
    });
    $('button.clear-data').on('click', function(e){
        e.preventDefault();
        var arr = {'_token': '{{csrf_token()}}'};
        $.post( "{{url('admin/clear-data-cache')}}", arr, function(data){
            toastr.info(data);
        }); 
    });
    $('button.config-cache').on('click', function(e){
        e.preventDefault();
        var arr = {'_token': '{{csrf_token()}}'};
        $.post( "{{url('admin/clear-config-cache')}}", arr, function(data){
            toastr.info(data);
        }); 
    });

</script>
@stop

