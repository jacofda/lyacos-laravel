@extends('layouts.app')


@section('meta')
<title>{{$element->name}} - Readings: {{$element->published_at->format('Y')}} - {{$element->location}} {{$element->country}} | {{config('app.name')}}</title>
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{config('app.url')}}readings/{{$element->published_at->format('Y')}}/{{$element->slug}}">
<meta itemprop="name" content="{{$element->name}} | {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} | {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta property="og:title" content="{{$element->name}} | {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{config('app.url')}}readings/{{$element->published_at->format('Y')}}/{{$element->slug}}" />
<meta property="og:description" content="{{$element->trecento}}" />

@stop

@section('content')

    <section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                    <a href="{{url('readings/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
                @endif
            </div>
            <div class="page-title">
                <h1>{{$element->name}}</h1>
                <h2>{{$element->h2}}</h2>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li><a href="{{url('readings')}}">Readings & Events</a> </li>
                  <li class="active">{{$element->name}}</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>

        <section id="page-content" class="p-b-0">
            <div class="container">
                <div class="row m-b-40">


                    <div class="col-md-4">

                        <div class="portfolio-attributes style2">
                            @if($element->end_at)
                                <div class="attribute"><strong>From:</strong>
                                    {{$element->published_at->format('d/m/Y')}} {{$element->start_at_hour}}
                                    <strong>To:</strong>
                                    {{$element->end_at->format('d/m/Y')}} {{$element->end_at_hour}}
                                </div>
                            @else
                                <div class="attribute"><strong>Date event:</strong>
                                    {{$element->published_at->format('d/m/Y')}} {{$element->start_at_hour}}
                                </div>
                            @endif
                            <div class="attribute"><strong>Location:</strong>
                                {{$element->location}}, {{$element->country}}
                            </div>
                        </div>


                    </div>
                    <div class="col-md-8">
                            <div class="project-description pt-4">
                                <h3>{!! strip_tags($element->description, '<a><b><i><ul><li>') !!}</h3>
                            </div>
                    </div>
                </div>
            </div>



            <div class="post-navigation">
                <a href="{{$element->prev->reading_slug}}" class="post-prev" title="{{$element->prev->name}}">
                    <div class="post-prev-title"><span>Previous</span>{{$element->prev->name}}</div>
                </a>
                <a href="{{url('readings')}}" class="post-all" title="all readings and events">
                    <i class="fa fa-th"></i>
                </a>
                <a href="{{$element->next->reading_slug}}" class="post-next" title="{{$element->next->name}}">
                    <div class="post-next-title"><span>Next</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>


@stop
