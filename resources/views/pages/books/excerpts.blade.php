@extends('layouts.app')
@section('meta')
<title>Excerpts of Poena Damni Trylogy in various languages</title>
<link rel="canonical" href="{{config('app.url')}}books/excerpts">

@stop

@section('content')

	<section id="page-title" class="page-title-classic">
        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('admin/excerpts')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Admin Excerpts</a>
                </div>
                @endif

            <div class="page-title">
                <h1 class=""> Excerpts</h1>
                <h2 class="uppercase i">Extracts of Poena Damni trilogy</h2>
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li><a href="{{url('books')}}">Books</a> </li>
                  <li class="active">Excerpts</li>
                </ul>
            </nav>
        </div>
    </div>

        <section id="page-content" class="p-b-0">
            <div class="container">
                @foreach($books as $book)
                    <div class="row m-b-40">
                        <div class="col-md-3">
                            <img class="img-responsive" src="{{$book->display}}" alt="{{$book->name}}">
                        </div>
                        <div class="col-md-9">

                                <h3 class="mt-25">Excerpts {{$book->name}}</h3>
                                @foreach($book->excerpts()->get()->chunk(4) as $chunk)

                                        <div class="portfolio-attributes style2" style="float: left; clear:none;">
                                            @foreach($chunk as $extract)
                                                <div class="attribute">
                                                    @if($extract->link_url)
                                                        <strong><a target="_BLANK" title="external link to {{$extract->link_text}}" href="{{$extract->link_url}}">{{$extract->name}} [<b>{{$extract->language->format_639_1}}</b>] <br> </a></strong>{{$extract->h2}} [external link]
                                                    @else
                                                        <strong><a href="{{$extract->uri}}">{{$extract->name}} [<b>{{$extract->language->format_639_1}}</b>] <br> </a></strong>{{$extract->h2}}
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>

                                @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </section>

@stop
