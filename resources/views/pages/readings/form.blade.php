<div class="form-group">
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Reading's name*"]) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('h2', null, ['class' => 'form-control', 'placeholder' => 'Subtitle ...']) !!}
</div>

<div class="form-group">
    {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
</div>

<div class="form-group">
    {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
</div>

<div class="form-group">
	{!! Form::textarea('description', null, ['id' => 'html-editor', 'class' => 'form-control', 'placeholder' => 'at least 150 characters*']) !!}
</div>

<div class="clearfix"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input 
                    name="published_at" 
                    type="text" class="form-control published_at"
                    @if( isset($element) )
                        @if(! is_null($element->published_at) )
                            value="{{$element->published_at->format('d/m/Y')}}"
                        @endif
                    @endif
                    placeholder="event starts day*"
                >
                @if ($errors->has('published_at'))
                    <span class="error">
                        <strong class="color-danger">{{ $errors->first('published_at') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::text('start_at_hour', null, ['class' => 'form-control', 'placeholder' => 'time 00:00 format']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input 
                    name="end_at" 
                    type="text" class="form-control end_at" 
                    @if( isset($element) )
                        @if(! is_null($element->end_at) )
                            value="{{$element->end_at->format('d/m/Y')}}"
                        @endif
                    @endif
                    placeholder="event ends day*"
                >
                @if ($errors->has('end_at'))
                    <span class="error">
                        <strong class="color-danger">{{ $errors->first('end_at') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::text('end_at_hour', null, ['class' => 'form-control', 'placeholder' => 'time 00:00 format']) !!}
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>



<div class="form-group text-center">
	<a href="{{url('admin/readings')}}" class="btn btn-success">Back to Readings</a>
    <button type="submit" class="btn btn-primary" value="{{$submitButtonText}}">{{$submitButtonText}}</button>
</div>


@section('scripts')
<script>
	$('textarea#html-editor').trumbowyg();
	$('input.published_at').datepicker({format: "dd/mm/yyyy"});
    $('input.end_at').datepicker({format: "dd/mm/yyyy"});
</script>
@stop