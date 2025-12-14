<div class="form-group">
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Publication's title*"]) !!}
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
	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'at least 150 characters*']) !!}
    @if ($errors->has('description'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('description') }}</strong>
        </span>
    @endif
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
    {!! Form::text('buy_link', null, ['class' => 'form-control', 'placeholder' => 'complete link ... https://www.website.com']) !!}
    @if ($errors->has('buy_link'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('buy_link') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('buy_text', null, ['class' => 'form-control', 'placeholder' => 'text you want to appear on the link ... i.e. Buy on Amazon']) !!}
    @if ($errors->has('buy_text'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('buy_text') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('buy_link_alternative', null, ['class' => 'form-control', 'placeholder' => 'complete link ... https://www.website2.com']) !!}
    @if ($errors->has('buy_link_alternative'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('buy_link_alternative') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('buy_text_alternative', null, ['class' => 'form-control', 'placeholder' => 'text you want to appear on the alternatve link ... i.e. Buy on Shoestring Press']) !!}
    @if ($errors->has('buy_text_alternative'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('buy_text_alternative') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('translated_by', null, ['class' => 'form-control', 'placeholder' => 'translated by']) !!}
    @if ($errors->has('translated_by'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('translated_by') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
	{!! Form::select('book_edition', ['1st' => '1st', '2nd' => '2nd', '3rd' => '3rd', '4th' => '4th'], null, ['placeholder' => 'Select a book edition', 'class' => 'form-control']) !!}
    @if ($errors->has('book_edition'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('book_edition') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">book formats</div>

        <select name="formats[]" class="formats form-control form-control-danger" multiple="multiple">
            <option></option>
            @foreach($formats as $id => $name)
                @if( in_array($id, $selectedFormat) )
                    <option selected value="{{$id}}">{{$name}}</option>
                @else
                    <option value="{{$id}}">{{$name}}</option>
                @endif    
            @endforeach
        </select>

        @if ($errors->has('formats'))
            <span class="error">
                <strong class="color-danger">{{ $errors->first('formats') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::text('isbn', null, ['class' => 'form-control', 'placeholder' => 'ISBN']) !!}
    @if ($errors->has('isbn'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('isbn') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::text('publisher', null, ['class' => 'form-control', 'placeholder' => 'publisher']) !!}
    @if ($errors->has('publisher'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('publisher') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::number('number_of_pages', null, ['class' => 'form-control', 'placeholder' => 'number of pages', 'min' => '0', 'step' => '1']) !!}
    @if ($errors->has('number_of_pages'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('number_of_pages') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'price ... ie. 8.41', 'min' => '0', 'step' => '0.01', 'data-number-to-fixed' => '2', "data-number-stepfactor" => "100"]) !!}
    @if ($errors->has('price'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
	{!! Form::select('currency', ['USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP'], null, ['placeholder' => 'Select a currency', 'class' => 'form-control']) !!}
    @if ($errors->has('currency'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('currency') }}</strong>
        </span>
    @endif
</div>

<div class="form-group text-center">
	<a href="{{url('admin/books')}}" class="btn btn-success">Back to Books</a>
    <button type="submit" class="btn btn-primary" value="{{$submitButtonText}}">{{$submitButtonText}}</button>
</div>


@section('scripts')
<script>
	// $('textarea#html-editor').trumbowyg();
	$('input.published_at').datepicker({format: "mm/yyyy",startView: 1,minViewMode: 1});
    $('.formats').select2({'placeholder': 'Select at least one format'});
</script>
@stop