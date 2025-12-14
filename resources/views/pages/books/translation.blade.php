@extends('layouts.app')
@section('meta')
<title>{{$element->name}} - {{ucfirst($language)}} - {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}books/{{$language}}/{{$element->slug}}">
@stop

@section('content')

    @if($element->page_background)
        <section id="page-title" class="darker" data-parallax-image="{{$element->page_background}}">
    @else
        <section id="page-title" class="page-title-classic">
    @endif

        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('translations/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a><a href="{{url('translations/'.$element->slug.'/media')}}" class="btn btn-xs btn-warning"><i class="fa fa-image"></i>Image</a>
                </div>
                @endif

            <div class="page-title">
                <h1>{{$element->name}}</h1>
                <h2>{{$element->h2}} - {{ucfirst($language)}} Edition</h2>
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li><a href="{{url('books')}}">Books</a> </li>
                  <li><a href="{{url('books/'.$language)}}">{{ucfirst($language)}}</a> </li>
		          <li class="active">{{$element->name}}</li>
                </ul>
            </nav>
        </div>
    </div>



   <section id="page-content" class="p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
						<img class="img-responsive" src="{{$element->cover}}" alt="cover {{$element->name}}">
                    </div>

                    <div class="col-md-3">
                        <div class="portfolio-attributes style2 p-3 pt-0">
                            <div class="attribute"><strong>Title:</strong> {{$element->name}}</div>
                            <div class="attribute"><strong>Publisher:</strong> {{$element->publisher}}</div>
                            @if($element->translated_by)
                                <div class="attribute"><strong>Translated by:</strong> {{$element->translated_by}}</div>
                            @endif
                            <div class="attribute"><strong>Published: </strong>{{$element->published_at->format('M Y')}}</div>
                            <div class="attribute"><strong>Edition: </strong> {{$element->book_edition}} Edition</div>
                            <div class="attribute"><strong>Pages: </strong> {{$element->number_of_pages}}</div>
                            <div class="attribute"><strong>Format: </strong>
                                @foreach($element->formats as $format)
                                    @if($loop->last)
                                        {{$format->name}}
                                    @else
                                        {{$format->name}} or
                                    @endif
                                @endforeach
                            </div>
                            @if($element->isbn)
                            <div class="attribute"><strong>ISBN: </strong> {{$element->isbn}}</div>
                            @endif
                        </div>

                    </div>



                    <div class="col-md-5">
                        <div class="project-description">
                            <h3 class="p15"> {!! $element->description!!}</h3>

                            @if($element->buy_link)
                                <div class="p-3 pb-1"> <a target="_BLANK" href="{{$element->buy_link}}" class="btn btn-dark btn-outline">Buy on {{$element->buy_text}}</a></div>
                            @endif
                            @if($element->buy_link_alternative)
                                <div class="p-3 pt-1"> <a target="_BLANK" href="{{$element->buy_link_alternative}}" class="btn btn-dark btn-outline">Buy on {{$element->buy_text_alternative}}</a></div>
                            @endif

                        </div>
                    </div>

                </div>

                <hr class="space">
            </div>

        </section>

        @include('pages.books.latest')

@stop
