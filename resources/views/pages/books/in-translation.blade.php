@extends('layouts.app')
@section('meta')
<title>In Translation - {{config('app.name')}}</title>
@stop

@section('content')

    <section id="page-title" class="page-title-classic">
        <div class="container">          
            <div class="page-title">
                <h1>In Translation</h1>
                <h2>Excerpts divided by languages</h2>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li class="active">In Translation</li>
                </ul>
            </nav>
        </div>
    </div>



    <section id="page-content" class="p-b-0">
        <div class="container">
            <div class="row">
                @foreach($elements as $language_id => $arr)
                    <div class="row">

                        <div class="hr-title hr-long center"><abbr>{{\App\Language::find($language_id)->name}}</abbr> </div>

                        <div id="portfolio" class="grid-layout portfolio-1-columns" data-margin="20">
                            @foreach($arr as $key => $element)

                                <div class="portfolio-item no-overlay no-cursor">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-description text-left portfolio-padding">
                                            
                                            @if($element['link_url'])
                                                <a target="_BLANK" title="external link to {{$element['link_text']}}" href="{{$element['link_url']}}">
                                                    <h3>
                                                        {{-- <span class="uppercase bold mb-0">{{\App\Language::find($language_id)->name}}</span> --}}
                                                        {{\App\Book::find($element['book_id'])->name}}
                                                    </h3>
                                                    {{$element['name']}} - {{$element['h2']}} 
                                                </a>
                                                <small>[external link]</small>
                                            @else
                                                <a href="{{ url('books/excertps/'.$element['slug']) }}">
                                                    <h3>
                                                        {{-- <span class="uppercase bold mb-0">{{\App\Language::find($language_id)->name}}</span> --}}
                                                        {{\App\Book::find($element['book_id'])->name}}
                                                    </h3>
                                                    {{$element['name']}} - {{$element['h2']}}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach












            </div>
        </div>
    </section>

@stop