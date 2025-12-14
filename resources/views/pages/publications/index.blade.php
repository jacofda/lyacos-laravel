@extends('layouts.app')

@section('meta')
@if(is_null($slug))
    <title>Other Publications: journals, news & articles printed and online | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}publications">
    <meta name="description" content="The most important list of publications, news and articles about Poena Damni Trilogy. Dimitris Lyacos.">
    <meta itemprop="name" content="Publications | {{config('app.name')}}">
    <meta itemprop="description" content="The most important list of publications, news and articles about Poena Damni Trilogy. Dimitris Lyacos.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Publications | {{config('app.name')}}">
    <meta name="twitter:description" content="The most important list of publications, news and articles about Poena Damni Trilogy. Dimitris Lyacos.">
    <meta property="og:title" content="Publications | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}publications" />
    <meta property="og:description" content="The most important list of publications, news and articles about Poena Damni Trilogy. Dimitris Lyacos." />
@else
    <title>Other Publications: journals, news & articles {{ucwords( str_replace("-", " ", $slug))}} | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}publications/{{$slug}}">
    <meta name="description" content="{{ucfirst($slug)}} publications of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta itemprop="name" content="{{ucwords( str_replace("-", " ", $slug))}} Publications | {{config('app.name')}}">
    <meta itemprop="description" content="{{ucfirst($slug)}} publications of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ucwords( str_replace("-", " ", $slug))}} Publications | {{config('app.name')}}">
    <meta name="twitter:description" content="{{ucfirst($slug)}} publications of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta property="og:title" content="{{ucwords( str_replace("-", " ", $slug))}} Publications | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}publications/{{$slug}}" />
    <meta property="og:description" content="{{ucfirst($slug)}} publications of Poena Damni Trilogy. Dimitris Lyacos." />
@endif
@stop

@section('content')

	<section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                	<a href="{{url('admin/publications')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Publications</a>
                @endif
            </div>
            <div class="page-title">
                @if(is_null($slug))
                    <h1>Other Publications</h1>
                    <h2 class="i">Collections of interviews and articles</h2>
                @else
                    <h1>Other Publications {{$slug}}</h1>
                    @if($slug == 'oldest' || $slug == 'latest')
                        <h2>Other Publications sorted by date of publishing ({{$slug}})</h2>
                    @else
                        @if($slug == 'online')
                            <h2>Other Publications published online</h2>
                        @else
                            <h2>Other Publications {{$slug}}</h2>
                        @endif
                    @endif
                @endif
            </div>
        </div>
	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                    @if(is_null($slug))
                        <li class="active">Publications</li>
                    @else
                        <li><a href="{{url('publications')}}">Publications</a> </li>
                        <li class="active">{{ucfirst($slug)}}</li>
                    @endif
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

            @include('pages.publications.grid')

            <div class="sidebar col-md-3">

                <div class="widget">
                    <nav class="grid-filter gf-outline">
                        <ul class="real-click">
                            <li @if(is_null($slug)) class="active" @endif><a href="{{url('publications')}}">All</a></li>
                            <li @if($slug == 'latest') class="active" @endif><a href="{{url('publications/latest')}}">Latest</a></li>
                            <li @if($slug == 'oldest') class="active" @endif><a href="{{url('publications/oldest')}}">Oldest</a></li>
                            <li @if($slug == 'printed') class="active" @endif><a href="{{url('publications/printed')}}">Printed</a></li>
                            <li @if($slug == 'online') class="active" @endif><a href="{{url('publications/online')}}">Online</a></li>

                        </ul>
                        <div class="grid-active-title">
                            @if(is_null($slug))
                                All
                            @else
                                {{ucfirst($slug)}}
                            @endif
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>



@stop

@section('scripts')
<script>
    (function(){
        $('select.province').on('change', function(){
            $('.province-active-title').html($(this).val());
            window.location.href = "{{env('APP_URL')}}portfolio/"+$(this).val();
        });
        $('ul.real-click li a').on('click', function(){
            window.location.href = $(this).attr('href');
        });
    })(jQuery)
</script>
@stop
