@extends('layouts.app')
@section('meta')
<title>{{$element->name}}</title>
@stop

@section('content')

	<section id="page-title" class="darker" data-parallax-image="{{$element->book->background}}">
        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{$element->uri.'/edit'}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a><a href="{{$element->uri.'/media'}}" class="btn btn-xs btn-warning"><i class="fa fa-image"></i>Image</a>
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
                </div>
                <div class="col-md-3">
                    
                    @if(App\Excerpt::where('book_id', $element->book->id)->where('language_id', $element->language->id)->where('id', '!=', $element->id)->exists())
                    <div class="grid-item">
                        <div class="widget clearfix widget-categories">
                            <h4 class="widget-title">other extracts in {{$element->language->name}}</h4>
                            <ul class="list list-arrow-icons">
                                @foreach(\App\Excerpt::where('book_id', $element->book->id)->where('language_id', $element->language->id)->where('id', '!=', $element->id)->get() as $extract)
                                <li><a href="#">{{$extract->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="widget clearfix widget-blog-articles">
                        <h4 class="widget-title">other excerpts of {{$element->book->name}}</h4>
                        <ul class="list-posts list-medium">
                            @foreach(\App\Excerpt::where('book_id', $element->book->id)->where('language_id', '!=', $element->language->id)->get() as $extract)
                            <li>
                                <a href="{{url('books/excerpts/'.$extract->slug)}}">{{$extract->name}} [<b>{{$extract->language->format_639_1}}</b>] <br> <small>{{$extract->h2}}</small></a>
                                <small></small>
                            </li>
                            @endforeach

                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </section>


@stop


