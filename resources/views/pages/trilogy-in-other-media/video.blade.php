@extends('layouts.app')


@section('meta')
<title>{{$element->name}} | {{config('app.name')}}</title>
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{config('app.url')}}/the-trilogy-in-other-media/{{$element->slug}}">
<meta itemprop="name" content="{{$element->name}} | {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} | {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta property="og:title" content="{{$element->name}} | {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{config('app.url')}}/the-trilogy-in-other-media/{{$element->slug}}" />
<meta property="og:description" content="{{$element->trecento}}" /> 

@stop

@section('content')
    

    <section id="page-title" class="page-title-classic">

        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                    <a href="{{url('the-trilogy-in-other-media/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
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
                  <li><a href="{{url('the-trilogy-in-other-media')}}">The trilogy in other media</a> </li>
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
                            <div class="attribute"><strong>Presented:</strong> {{$element->published_at->format('M Y')}}</div>
                            @if($element->books()->exists())
                                <div class="attribute">
                                    <strong>
                                        @if($element->books()->count() > 1)
                                            Related to books:
                                        @else
                                            Related to book:
                                        @endif
                                    </strong>
                                    @foreach($element->books as $book)
                                        @if($loop->last)
                                            <a href="{{$book->uri}}"><b>{{$book->name}}</b></a>
                                        @else
                                            <a href="{{$book->uri}}"><b>{{$book->name}}</b></a>, 
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if($element->link_url)
                            <div class="mt-25"> <a title="external link {{$element->link_text}}" target="_BLANK" href="{{$element->link_url}}" class="btn btn-outline btn-dark btn-lg">{{$element->link_text}}</a></div>
                            @endif
                        </div>


                    </div>
                    <div class="col-md-8">

                        <div class="project-description pt-4">
                            <h3>{!! strip_tags($element->description, '<a><b><br>') !!}</h3>
                        </div>


                            <div class="hr-title hr-long center"><abbr>Watch video</abbr> </div>
{{--                             <div data-lightbox="gallery" class="row">
                                <div class="col-md-4">
                                    <div class="grid-item">
                                        <div class="grid-item-wrap">
                                            <div class="grid-image"> <img alt="Image Lightbox" src="http://via.placeholder.com/810x510" /> </div>
                                            <div class="grid-description">
                                                <a href="{{asset('images/video/video-opt.mp4')}}" data-lightbox="iframe"><i class="fa fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <div class="text-center">
                                <video width="352" controls>
                                  <source src="{{asset('images/video/video-opt.mp4')}}" type="video/mp4">
                                  Your browser does not support HTML5 video.
                                </video>
                            </div>


                    </div>
                </div>
            </div>



            <div class="post-navigation">
                <a href="{{$element->prev->uri}}" class="post-prev" title="vedi portfolio {{$element->prev->name}}">
                    <div class="post-prev-title"><span>Previous</span>{{$element->prev->name}}</div>
                </a>
                <a href="{{url('the-trilogy-in-other-media')}}" class="post-all" title="all the trilogy in other media">
                    <i class="fa fa-th"></i>
                </a>
                <a href="{{$element->next->uri}}" class="post-next" title="vedi portfolio {{$element->next->name}}">
                    <div class="post-next-title"><span>Next</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>


@stop


 

