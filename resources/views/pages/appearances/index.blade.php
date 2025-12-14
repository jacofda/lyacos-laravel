@extends('layouts.app')

@section('meta')
    @if(is_null($slug))
        <title>Media Appearances: readings, performances and interviews in radio and tv | {{config('app.name')}}</title>
    @else
        @if($slug != 'other')
            <title>{{ucfirst($slug)}} Appearances: readings, performances and interviews | {{config('app.name')}}</title>
        @else
            <title>Media Appearances: interviews | {{config('app.name')}}</title>
        @endif
    @endif
    <link rel="canonical" href="{{config('app.url')}}media-appearances">
    <meta name="description" content="">
    <meta itemprop="name" content="Media Appearances | {{config('app.name')}}">
    <meta itemprop="description" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Media Appearances | {{config('app.name')}}">
    <meta name="twitter:description" content="">
    <meta property="og:title" content="Media Appearances | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}media-appearances" />
    <meta property="og:description" content="" />
@stop

@section('content')

	<section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                	<a href="{{url('admin/media-appearances')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Admin Media Appearances</a>
                @endif
            </div>
            <div class="page-title">
                @if(is_null($slug))
                    <h1>Media Appearances</h1>
                    <h2>Readings, Performances and Interviews in radio and tv</h2>
                @else
                    <h1>Media Appearances: {{ucfirst($slug)}}</h1>
                    <h2>Readings, Performances and Interviews</h2>
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
                        <li class="active">Media Appearances</li>
                    @else
                        <li><a href="{{url('media-appearances')}}">Media Appearances</a> </li>
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

            @include('pages.appearances.grid')

            <div class="sidebar col-md-3">

                <div class="widget">
                    <nav class="grid-filter gf-outline">
                        <ul class="real-click">
                            <li @if(is_null($slug)) class="active" @endif><a href="{{url('media-appearances')}}">All</a></li>
                            <li @if($slug == 'radio') class="active" @endif><a href="{{url('media-appearances/radio')}}">Radio</a></li>
                            <li @if($slug == 'tv') class="active" @endif><a href="{{url('media-appearances/tv')}}">Television</a></li>
                            <li @if($slug == 'other') class="active" @endif><a href="{{url('media-appearances/other')}}">Other</a></li>
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
