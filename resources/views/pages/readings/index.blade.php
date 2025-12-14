@extends('layouts.app')

@section('meta')
@if(is_null($slug))
    <title>Readings & Events | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}readings">
    <meta name="description" content="">
    <meta itemprop="name" content="Readings & Events | {{config('app.name')}}">
    <meta itemprop="description" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Readings & Events | {{config('app.name')}}">
    <meta name="twitter:description" content="">
    <meta property="og:title" content="Readings & Events | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}readings" />
    <meta property="og:description" content="" />
@else
    <title>{{ucwords( str_replace("-", " ", $slug))}} Publications | {{config('app.name')}}</title>
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
                	<a href="{{url('admin/readings')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Readings</a>
                @endif
            </div>
            <div class="page-title">
                @if(is_null($slug))
                    <h1>Readings</h1>
                    <h2>Readings, Lectures, Performances & Events</h2>
                @else
                    <h1>{{$slug}} Publications</h1>
                    @if($slug == 'oldest' || $slug == 'latest')
                        <h2>Publications sorted by date of publishing ({{$slug}})</h2>
                    @else
                        @if($slug == 'online')
                            <h2>Articles published online</h2>
                        @else
                            <h2>Articles published in {{$slug}}</h2>
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
                        <li class="active">Readings</li>
                    @else
                        <li><a href="{{url('publications')}}">Readings</a> </li>
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

            @include('pages.readings.grid')

            <div class="sidebar col-md-3">

                <div class="widget">
                    <nav class="grid-filter gf-outline">
                        <ul class="real-click">
                            <li @if(is_null($slug)) class="active" @endif><a href="{{url('readings')}}">All</a></li>
                            <li @if($slug == 'latest') class="active" @endif><a href="{{url('readings/latest')}}">Latest</a></li>
                            <li @if($slug == 'oldest') class="active" @endif><a href="{{url('readings/oldest')}}">Oldest</a></li>
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
        $('ul.real-click li a').on('click', function(){
            window.location.href = $(this).attr('href');
        });
    })(jQuery)
</script>
@stop
