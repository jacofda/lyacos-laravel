@extends('layouts.app')


@section('meta')
@if( !is_null($element->location) && $element->type != 'other')
    <title>{{$element->name}}. Media Appearence: {{$element->type}} in {{$element->location}} | {{config('app.name')}}</title>
@elseif ( !is_null($element->location) )
    <title>{{$element->name}}. Media Appearence in {{$element->location}} | {{config('app.name')}}</title>
@else
    <title>Media Appearence: {{$element->name}} | {{config('app.name')}}</title>
@endif
<title>{{$element->name}} | {{config('app.name')}}</title>
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{config('app.url')}}media-appearances/{{$element->slug}}">
<meta itemprop="name" content="{{$element->name}} | {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} | {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta property="og:title" content="{{$element->name}} | {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content=""{{config('app.url')}}media-appearances/{{$element->slug}}"" />
<meta property="og:description" content="{{$element->trecento}}" />
@stop

@section('content')
    @if($element->page_background)
        <section id="page-title" class="darker" data-parallax-image="{{$element->page_background}}">
    @else
        <section id="page-title" class="page-title-classic">
    @endif
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                    <a href="{{url('media-appearances/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
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
                  <li><a href="{{url('media-appearances')}}">Media Appearances</a> </li>
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


                    <div class="col-md-2">
                        <div class="portfolio-attributes style2 pt-4">
                            <div class="attribute"><strong>Published:</strong> {{$element->published_at->format('M Y')}}</div>
                            @if($element->location)
                                <div class="attribute"><strong>Location:</strong> {{$element->location}}</div>
                            @endif
                            <div class="attribute"><strong>Media:</strong> {{$element->type}}</div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="project-description pt-4">
                            @if( strlen($element->description) > 300 )
                                <p class="asH3-description">{!! strip_tags($element->description, '<a><b><br>') !!}</p>
                            @else
                                <h3>{!! strip_tags($element->description, '<a><b><br>') !!}</h3>
                            @endif
                        </div>
                        @if($element->link_url)
                            <div> <a rel="nofollow" title="external link {{$element->link_text}}" target="_BLANK" href="{{$element->link_url}}" class="btn btn-rounded">{!!$element->link_text!!}</a></div>
                        @endif
                    </div>
                </div>
            </div>



            <div class="post-navigation">
                <a href="{{$element->prev->uri}}" class="post-prev" title="see previous media appearances {{$element->prev->name}}">
                    <div class="post-prev-title"><span>Previous</span>{{$element->prev->name}}</div>
                </a>
                <a href="{{url('media-appearances')}}" class="post-all" title="all media appearances">
                    <i class="fa fa-th"></i>
                </a>
                <a href="{{$element->next->uri}}" class="post-next" title="see next media appearances {{$element->next->name}}">
                    <div class="post-next-title"><span>Next</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>


@stop
