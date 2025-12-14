@extends('layouts.app')
@section('meta')
<title>Excerpts in {{$lang->name}} - {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}/excerpts/{{$lang->slug}}">
@stop

@section('content')

    <section id="page-title" class="page-title-classic">
        <div class="container">          
            <div class="page-title">
                <h1>Excerpts in {{$lang->name}}</h1>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
                  <li class="active"> {{$lang->name}} </li>
                </ul>
            </nav>
            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>
        </div>
    </div>

    <section id="page-content" class="p-b-0">
        <div class="container">
            <div class="row">
                <div class="hr-title hr-long center"><abbr>{{$lang->name}}</abbr> </div>
                <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
                    @forelse($elements as $excerpt)
                        <div class="portfolio-item no-overlay no-cursor">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-description text-left">

                                    @if(! is_null($excerpt->link_url) && strlen($excerpt->description) < 88 )
                                        <a target="_BLANK" rel="nofollow" href="{{$excerpt->link_url}}">
                                            <h3>{{$excerpt->name}} <br>
                                                <small>{{$excerpt->h2}} [external link]
                                                    <br><b style="font-size: 17px;">{{$excerpt->book->name}}</b>
                                                </small>
                                                @if(! \Auth::guest()) 
                                                    <a class="btn btn-xxs btn-success" href="{{url('excerpts/'.$excerpt->slug.'/edit')}}">Edit</a> 
                                                @endif
                                            </h3>
                                        </a>
                                    @else
                                        <a href="{{$excerpt->uri}}">
                                            <h3>{{$excerpt->name}} 
                                                <br>
                                                <small>{{$excerpt->h2}}
                                                    <br><b style="font-size: 17px;">{{$excerpt->book->name}}</b>
                                                </small>
                                                @if(! \Auth::guest()) 
                                                    <a class="btn btn-xxs btn-success" href="{{url('excerpts/'.$excerpt->slug.'/edit')}}">Edit</a>
                                                @endif
                                            </h3>
                                        </a> 
                                    @endif
                                    <p class="smallerLineHeigh">{{$excerpt->trecento}}</p>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="portfolio-item no-overlay no-cursor">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-description text-left">
                                    <a rel="nofollow" href="#">
                                        <h3>Forthcoming<br></h3>
                                        <p class="smallerLineHeigh">available soon</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@stop