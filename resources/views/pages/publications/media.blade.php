@extends('layouts.admin')

@section('title')
Aggiungi immagini o file: {{$element->name}}
@stop

@section('content')

        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <form action="{{url('admin/media/upload')}}" class="dropzone" id="dropzoneForm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                        <input name="mediable_type" type="hidden" value="App\Models\{{$element->class}}" />
                        <input name="mediable_id" type="hidden" value="{{$element->id}}" />
                    </div>
                </div>
            </form>
        </div>


    <div class="clearfix"></div><hr><div class="clearfix"></div>

    @include('pages.admin.media-table', ['directory' => $element->directory])

    <div class="mx-auto mt-5">
        <a class="btn btn-primary" href="{{url('admin/'.$element->directory)}}">Back to {{ucfirst($element->directory)}}</a><a class="btn btn-success ml-2" href="{{$element->uri}}">Vedi {{$element->name}}</a>
    </div>

@stop

@include('pages.admin.media-script')
