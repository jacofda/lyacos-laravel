@extends('layouts.app')
@section('meta')
<title>All Books - {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}books">
@stop

@section('content')
	<section id="page-title" class="page-title-classic">

        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('admin/books')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Books</a>
                </div>
                @endif

            <div class="page-title">
                <h1>All Books</h1>
                <h2>All Dimitris Lyacos' Book</h2>
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li class="active">Books</li>
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
                <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="20">
                    @foreach($elements as $book)
                        <div class="portfolio-item no-overlay">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{$book->uri}}">
                                    	<img src="{{$book->display}}" alt="{{$book->name}}">
                                    </a>
                                </div>
                                <div class="portfolio-description book-description">
                                    <a href="{{$book->uri}}">
                                        <h3>{{$book->name}}</h3>
                                        <span>{{$book->h2}}</span>
                                        <p>{{  substr($book->description, 0,strpos($book->description, "."))}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop
