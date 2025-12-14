<div class="form-group">
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Apperance's name*"]) !!}
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
    @if ($errors->has('location'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('location') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <input name="published_at" type="text" class="form-control published_at" value="{{ isset($element->published_at) ? $element->published_at->format('m/Y') : ''}}" placeholder="date of apperance*">
    @if ($errors->has('published_at'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('published_at') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    {!! Form::select('type', ['tv' => 'tv', 'radio' => 'radio', 'theather' => 'theater', 'video' => 'video','other' => 'other'], null, ['placeholder' => 'Select media type', 'class' => 'form-control']) !!}
    @if ($errors->has('type'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('link_url', null, ['class' => 'form-control', 'placeholder' => 'complete link ... https://www.website.com']) !!}
    @if ($errors->has('link_url'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('link_url') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('link_text', null, ['class' => 'form-control', 'placeholder' => 'text you want to appear on the link ... see video here']) !!}
</div>

<div class="form-group">
	{!! Form::textarea('description', null, ['id' => 'html-editor', 'class' => 'form-control', 'placeholder' => 'describe media apperance*']) !!}
</div>



<div class="form-group text-center">
	<a href="{{url('admin/media-apperances')}}" class="btn btn-success">Back to Media Apperances</a>
    <button type="submit" class="btn btn-primary" value="{{$submitButtonText}}">{{$submitButtonText}}</button>
</div>


@section('scripts')
<script>
	$('textarea#html-editor').trumbowyg();
    $('input.published_at').datepicker({format: "mm/yyyy",startView: 1,minViewMode: 1});
</script>
@stop
