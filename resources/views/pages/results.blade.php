@extends('layouts.app')


@section('meta')
<title>Search Results | {{config('app.name')}}</title>
@stop

@section('content')
    <section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
            </div>
            <div class="page-title">
                <h1>Search Results </h1>
                <h2>Results for search: {{{request('q')}}}</h2>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li class="active">Search Results</li>
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
                <div class="col-md-8 content">               
                    <div id="blog">
                        @forelse($results as $result)
                            <div class="post-item p-b-0 relative">
                                <div class="top-left">{{$loop->iteration}}</div>
                                <div class="post-item-description">
                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{$result->created_at->format('d/m/Y')}}</span>
                                    <span class="post-meta-date uppecase bold">{{ str_replace("-", " ", str_singular($result->directory)) }}</span>
                                    <h2 class="m-b-0"><a href="{{$result->uri}}">{{$result->name}}</a></h2>
                                    <p class="m-b-0">{{$result->trecento}}</p>
                                </div>
                            </div>
                        @empty
                            <div class="post-item">
                                No results found.
                            </div>
                        @endforelse
                    </div>
                    <div class="clearfix"></div>

                </div>
                <div class="sidebar col-md-4">
                        <div class="widget ">
                            <h4 class="widget-title">Search for "{{request('q')}}"</h4>
                            <p class="lead">Results found {{$results->count()}}</p>
                        </div>
                        {!! Form::open(['method' => 'get', 'url' => url('results'), 'class' => 'form-inline']) !!}   
                            <div class="input-group input-group-lg">
                                <input type="text" name="q" class="form-control" value="" placeholder="Search here ...">
                                <span class="input-group-btn">
                                    <button class="btn color btn-default" type="submit"><i class="fa fa-search"></i></button>                                   
                                </span>
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

@stop