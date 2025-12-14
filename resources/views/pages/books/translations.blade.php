@extends('layouts.app')
@section('meta')
<title>Translations</title>
@stop

@section('content')

	<section id="page-title">
        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('admin/translations')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Admin Translation</a>
                </div>
                @endif
            
            <div class="page-title">
                <h1 class=""> Translations</h1>
                <h2 class="impact uppercase">Poena Damni in others languages</h2>
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li><a href="{{url('books')}}">Books</a> </li>
                  <li class="active">Translations</li>
                </ul>
            </nav>
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
@stop