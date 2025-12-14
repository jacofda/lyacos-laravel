@extends('layouts.app')
@section('meta')
<title>{{$element->name}} | {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}books/excerpts/{{$element->slug}}">
@stop

@section('content')

	<section id="page-title" class="darker" data-parallax-image="{{$element->book->background}}">
        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('/excerpts/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a><a href="{{url('/excerpts/'.$element->slug.'/media')}}" class="btn btn-xs btn-warning"><i class="fa fa-image"></i>Image</a>
                </div>
                @endif

            <div class="page-title">
                <h1>{{$element->name}}</h1>
                <h2>{{$element->h2}} { {{$element->book->name}} }</h2>
            </div>
        </div>
	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li><a href="{{url('books')}}">Books</a> </li>
                  <li><a href="{{url('books/excerpts')}}">Excerpts</a> </li>
		          <li class="active">{{$element->name}} { {{$element->book->name}} }</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>

    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    {!! $element->description !!}
                    @if($element->link_url)
                        <a class="btn" target="_BLANK" href="{{$element->link_url}}">{{$element->link_text}}</a>
                    @endif
                </div>
                <div class="col-md-3">

                    @if(App\Models\Excerpt::where('book_id', $element->book->id)->where('language_id', $element->language->id)->where('id', '!=', $element->id)->exists())
                        <div class="widget clearfix widget-blog-articles">
                            <h4 class="widget-title mb-5">other extracts in {{$element->language->name}}</h4>
                            <ul class="list-posts list-medium">
                                @foreach(\App\Models\Excerpt::where('book_id', $element->book->id)->where('language_id', $element->language->id)->where('id', '!=', $element->id)->get() as $extract)
                                    @if($extract->link_url)
                                        <li>
                                            <a target="_BLANK" href="{{$extract->link_url}}">
                                                {{$extract->name}}
                                            </a>
                                            <small>{{$extract->h2}} [external link]</small>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{url('books/excerpts/'.$extract->slug)}}">
                                                {{$extract->name}}
                                            </a>
                                            <small>{{$extract->h2}}</small>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="widget clearfix widget-blog-articles">
                        <h4 class="widget-title mb-5">other excerpts of {{$element->book->name}}</h4>
                        <ul class="list-posts list-medium">
                            @foreach(\App\Models\Excerpt::where('book_id', $element->book->id)->where('language_id', '!=', $element->language->id)->get() as $extract)
                                @if($extract->link_url)
                                    <li>
                                        <a target="_BLANK" title="external link to {{$extract->link_text}}" href="{{$extract->link_url}}">
                                            {{$extract->name}} [<b>{{$extract->language->format_639_1}}</b>] <br>
                                        </a>
                                        <small>{{$extract->h2}} [external link]</small>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{url('books/excerpts/'.$extract->slug)}}">
                                            {{$extract->name}} [<b>{{$extract->language->format_639_1}}</b>] <br>
                                            <small>{{$extract->h2}}</small>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <small class="uppercase">See details of book:</small><br>
                    @if( \App\Models\Translation::where('language_id', $element->language_id)->where('book_id', $element->book_id)->exists() )
                        <a class="btn" href="{{\App\Models\Translation::where('language_id', $element->language_id)->where('book_id', $element->book_id)->first()->uri}}">
                            {{\App\Models\Translation::where('language_id', $element->language_id)->where('book_id', $element->book_id)->first()->name}}
                        </a>
                    @else
                        <a class="btn" href="{{url('books/english/'.$element->book->slug)}}">{{$element->book->name}}</a>
                    @endif

                </div>
            </div>
        </div>
    </section>


@stop
