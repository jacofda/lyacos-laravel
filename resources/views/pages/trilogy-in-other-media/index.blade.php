@extends('layouts.app')

@section('meta')

    <title>The trilogy in other media | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}the-trilogy-in-other-media">
    <meta name="description" content="The Trilogy in other media. Dimitris Lyacos.">
    <meta itemprop="name" content="The Trilogy in other media | {{config('app.name')}}">
    <meta itemprop="description" content="The Trilogy in other media. Dimitris Lyacos.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="The Trilogy in other media | {{config('app.name')}}">
    <meta name="twitter:description" content="The Trilogy in other media. Dimitris Lyacos.">
    <meta property="og:title" content="The Trilogy in other media | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}the-trilogy-in-other-media" />
    <meta property="og:description" content="The Trilogy in other media. Dimitris Lyacos." />

@stop

@section('content')

	<section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                	<a href="{{url('admin/trilogy-media')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Trilogy Media</a>
                @endif
            </div>
            <div class="page-title">
                <h1>The Trilogy in other media</h1>
                <h2 class="i">Sculpures, Performances, Intallations</h2>
            </div>
        </div>
	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                    <li class="active">The trilogy in other media</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>

<section id="page-content" class="sidebar-left">
    <div class="container">
        <div class="row">



<div class="content col-md-12 prodotti">


    <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
        @foreach($elements as $element)

            <div class="portfolio-item no-overlay no-cursor">
                <div class="portfolio-item-wrap">
                    @if($element->media()->where('type', 'cover')->exists())
                        <div class="portfolio-image">
                            <img src="{{asset('storage/the-trilogy-in-other-media/display/'.$element->media()->where('type', 'cover')->first()->filename)}}">
                        </div>
                    @endif
                    <div class="portfolio-description text-left mt-15">

                        @if(! is_null($element->link_url) && strlen($element->description) < 88 )
                            <a target="_BLANK" rel="nofollow" href="{{$element->link_url}}">
                                <h3>{{$element->name}} <br>
                                    <small>
                                        {{$element->h2}} [external link]
                                        @if($element->location)
                                            <br><b style="font-size: 17px;">{{$element->location}}</b>
                                        @endif
                                    </small>
                                    @if(! \Auth::guest())
                                        <a class="btn btn-xxs btn-success" href="{{url('elements/'.$element->slug.'/edit')}}">Edit</a>
                                        <a class="btn btn-xxs btn-primanry" href="{{$element->uri}}">View</a>
                                    @endif
                                </h3>
                            </a>
                        @else
                            <a href="{{$element->uri}}">
                                <h3>{{$element->name}}
                                    <br>
                                    <small>
                                        {{$element->h2}}
                                        @if($element->location)
                                            <br><b style="font-size: 17px;">{{$element->location}}</b>
                                        @endif
                                    </small>
                                    @if(! \Auth::guest())
                                        <a class="btn btn-xxs btn-success" href="{{url('elements/'.$element->slug.'/edit')}}">Edit</a>
                                    @endif
                                </h3>
                            </a>
                        @endif

                        <span>{{$element->published_at->format('M Y')}}</span>
                        <p class="smallerLineHeigh">{{$element->trecento}}</p>

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
