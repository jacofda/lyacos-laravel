@extends('layouts.app')

@section('meta')

    <title>Interviews | {{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}interviews">
    <meta name="description" content="Interviews and dialogues with Dimitris Lyacos. Poena Damni Trilogy.">
    <meta itemprop="name" content="Interviews | {{config('app.name')}}">
    <meta itemprop="description" content="Interviews and dialogues with Dimitris Lyacos. Poena Damni Trilogy.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Interviews | {{config('app.name')}}">
    <meta name="twitter:description" content="Interviews and dialogues with Dimitris Lyacos. Poena Damni Trilogy.">
    <meta property="og:title" content="Interviews | {{config('app.name')}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{config('app.url')}}interviews" />
    <meta property="og:description" content="Interviews and dialogues with Dimitris Lyacos. Poena Damni Trilogy." />

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
                <h1>Interviews</h1>
                <h2 class="i">Collections of interviews Dimitris Lyacos</h2>
            </div>
        </div>
	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                    <li class="active">Interviews</li>
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

            @include('pages.publications.grid-interview')

        </div>
    </div>
</section>



@stop
