<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Belongs to book</div>

        <select name="book_id" class="books form-control form-control-danger">
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

<div class="form-group">
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Title of excerpts*"]) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('h2', null, ['class' => 'form-control', 'placeholder' => 'Subtitle in any ...']) !!}
    @if ($errors->has('h2'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('h2') }}</strong>
        </span>
    @endif
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
	{!! Form::textarea('description', null, ['id' => 'html-editor', 'class' => 'form-control', 'placeholder' => 'at least 150 characters*']) !!}
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
    {!! Form::text('link_text', null, ['class' => 'form-control', 'placeholder' => 'text you want to appear on the link ... i.e. Buy on Amazon']) !!}
</div>




<div class="form-group text-center">
	<a href="{{url('admin/excerpts')}}" class="btn btn-success">Back to Excerpts</a>
    <button type="submit" class="btn btn-primary" value="{{$submitButtonText}}">{{$submitButtonText}}</button>
</div>


@section('scripts')
<script>
	$('textarea#html-editor').trumbowyg();
    $('.books').select2({'placeholder': 'Select a book'});
    $('.languagess').select2({'placeholder': 'Select a language'});
</script>
@stop