@extends('layouts.app')

@section('meta')
@if(is_null($slug))
    <title>Reviews | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}reviews">
    <meta name="description" content="The most important list of reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta itemprop="name" content="Reviews | {{config('app.name')}}">
    <meta itemprop="description" content="The most important list of reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Reviews | {{config('app.name')}}">
    <meta name="twitter:description" content="The most important list of reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta property="og:title" content="Reviews | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}reviews" />
    <meta property="og:description" content="The most important list of reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos." />
@else
    <title>{{ucwords( str_replace("-", " ", $slug))}} Reviews | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}reviews/{{$slug}}">
    <meta name="description" content="{{ucfirst($slug)}} reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta itemprop="name" content="{{ucwords( str_replace("-", " ", $slug))}} Reviews | {{config('app.name')}}">
    <meta itemprop="description" content="{{ucfirst($slug)}} reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ucwords( str_replace("-", " ", $slug))}} Reviews | {{config('app.name')}}">
    <meta name="twitter:description" content="{{ucfirst($slug)}} reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos.">
    <meta property="og:title" content="{{ucwords( str_replace("-", " ", $slug))}} Reviews | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}reviews/{{$slug}}" />
    <meta property="og:description" content="{{ucfirst($slug)}} reviews and critiques of Poena Damni Trilogy. Dimitris Lyacos." />
@endif
@stop

@section('content')

	<section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                	<a href="{{url('admin/reviews')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Admin Reviews</a>
                @endif
            </div>
            <div class="page-title">
                @if(is_null($slug))
                    <h1>Reviews</h1>
                    <h2>List of reviews and articles</h2>
                @else
                    <h1>{{ucwords( str_replace("-", " ", $slug))}} Reviews</h1>
                    @if($slug == 'oldest' || $slug == 'latest')
                        <h2>List of reviews and articles sorted by date of publishing ({{$slug}})</h2>
                    @else
                        <h2>List of reviews and articles of {{ucwords( str_replace("-", " ", $slug))}}</h2>
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
                        <li class="active">Reviews</li>
                    @else
                        <li><a href="{{url('reviews')}}">Reviews</a> </li>
                        <li class="active">{{ucwords( str_replace("-", " ", $slug))}}</li>
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

            @include('pages.reviews.grid')

            <div class="sidebar col-md-3">

                <div class="widget">
                    <nav class="grid-filter gf-outline">
                        <ul class="real-click">
                            <li @if(is_null($slug)) class="active" @endif><a href="{{url('reviews')}}">All</a></li>
                            <li @if($slug == 'latest') class="active" @endif><a href="{{url('reviews/latest')}}">Latest</a></li>
                            <li @if($slug == 'oldest') class="active" @endif><a href="{{url('reviews/oldest')}}">Oldest</a></li>
                            <li @if($slug == 'the-first-death') class="active" @endif><a href="{{url('reviews/the-first-death')}}">The First Death</a></li>
                            <li @if($slug == 'with-the-people-from-the-bridge') class="active" @endif><a href="{{url('reviews/with-the-people-from-the-bridge')}}">With the People of the Bridge</a></li>
                            <li @if($slug == 'z213-exit') class="active" @endif><a href="{{url('reviews/z213-exit')}}">Z213: Exit</a></li>
                        </ul>
                        <div class="grid-active-title">
                            @if(is_null($slug))
                                All
                            @else
                                {{ucwords( str_replace("-", " ", $slug))}}
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
