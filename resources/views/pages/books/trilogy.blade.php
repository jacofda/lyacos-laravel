@extends('layouts.app')
@section('meta')
<title>Poena Damni Trilogy</title>
@stop

@section('content')
	<section id="page-title">

        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('admin/books')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Books</a>
                </div>
                @endif
            
            <div class="page-title">
                <h1>Poena Damni Trilogy</h1>
                <h2>All Dimitris Lyacos' Book</h2>
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li><a href="{{url('/books')}}">Books</a> </li>
		          <li class="active">Poena Damni Trilogy</li>
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
                <div class="col-sm-10 col-sm-offset-1">
                    <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                        @foreach($elements as $book)
                            <div class="portfolio-item no-overlay">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="{{$book->uri}}">
                                        	<img src="{{$book->display}}" alt="{{$book->name}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop