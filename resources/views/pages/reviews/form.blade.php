<div class="form-group">
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Review's title*"]) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('h2', null, ['class' => 'form-control', 'placeholder' => 'Subtitle: insert journal/magazine']) !!}
</div>

<div class="form-group">
    {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location: City COUNTRY']) !!}
</div>

<div class="form-group">
    {!! Form::text('reviewer', null, ['class' => 'form-control', 'placeholder' => 'Reviewer: First and Last name']) !!}
</div>

<div class="form-group">
	{!! Form::textarea('description', null, ['id' => 'html-editor', 'class' => 'form-control', 'placeholder' => 'at least 150 characters*']) !!}
</div>

<div class="form-group">
    <input name="published_at" type="text" class="form-control published_at" value="{{ isset($element->published_at) ? $element->published_at->format('m/Y') : ''}}" placeholder="date of publishing*">
    @if ($errors->has('published_at'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('published_at') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('link_url', null, ['class' => 'form-control', 'placeholder' => 'complete link ... https://www.website.com']) !!}
</div>

<div class="form-group">
    {!! Form::text('link_text', null, ['class' => 'form-control', 'placeholder' => 'text you want to appear on the link ... i.e. Buy on Amazon']) !!}
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Language</div>

        <select name="language_id" class="languages form-control form-control-danger">
            <option></option>
            @foreach($languages as $id => $name)
                @if( in_array($id, $selectedLanguage) )
                    <option selected value="{{$id}}">{{$name}}</option>
                @else
                    <option value="{{$id}}">{{$name}}</option>
                @endif    
            @endforeach
        </select>

        @if ($errors->has('language_id'))
            <span class="error">
                <strong class="color-danger">{{ $errors->first('language_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Related to book</div>

        <select name="book_id[]" class="book_id form-control form-control-danger" multiple="multiple">
            <option></option>
            @foreach($books as $id => $name)
                @if( in_array($id, $selectedBook) )
                    <option selected value="{{$id}}">{{$name}}</option>
                @else
                    <option value="{{$id}}">{{$name}}</option>
                @endif    
            @endforeach
        </select>

    </div>
</div>


<div class="form-group text-center">
	<a href="{{url('admin/reviews')}}" class="btn btn-success">Back to Reviews</a>
    <button type="submit" class="btn btn-primary" value="{{$submitButtonText}}">{{$submitButtonText}}</button>
</div>


@section('scripts')
<script>
    $('.book_id').select2({'placeholder': 'Not obbligatory ... you can select more than 1 book'});
    $('.languagess').select2({'placeholder': 'Select a language'});
	$('textarea#html-editor').trumbowyg();
	$('input.published_at').datepicker({format: "mm/yyyy",startView: 1,minViewMode: 1});
</script>
@stop