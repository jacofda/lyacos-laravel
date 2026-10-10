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

@section('styles')
<style>
    .video-modal { width: min(1100px, 92vw, calc((100vh - 140px) * 16 / 9)); max-width: none; max-height: none; padding: 0; border: 0; background: transparent; overflow: visible; }
    .video-modal::backdrop { background: rgba(12, 12, 12, .92); backdrop-filter: blur(4px); }
    .video-modal[open] { animation: video-modal-in .3s ease-out; }
    .video-modal[open]::backdrop { animation: video-modal-fade .3s ease-out; }
    .video-modal-frame { aspect-ratio: 16 / 9; background: #000; border-radius: 4px; overflow: hidden; box-shadow: 0 30px 80px rgba(0, 0, 0, .6); }
    .video-modal-frame iframe { display: block; width: 100%; height: 100%; border: 0; }
    .video-modal-close { position: absolute; top: -56px; right: 0; width: 44px; height: 44px; padding: 0; border: 1px solid rgba(255, 255, 255, .4); border-radius: 50%; background: transparent; color: #fff; font-size: 18px; line-height: 42px; text-align: center; cursor: pointer; transition: all .3s; }
    .video-modal-close:hover, .video-modal-close:focus-visible { background: #57AAB4; border-color: #57AAB4; outline: 0; }
    body:has(.video-modal[open]) { overflow: hidden; }
    @keyframes video-modal-in { from { opacity: 0; transform: scale(.96); } }
    @keyframes video-modal-fade { from { opacity: 0; } }
</style>
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
                            @if($element->youtube_id)
                                <div class="m-t-30">
                                    <a href="https://www.youtube.com/watch?v={{$element->youtube_id}}" target="_blank" rel="noopener" class="btn btn-outline btn-dark btn-lg" id="video-modal-open" data-video-id="{{$element->youtube_id}}"><i class="fa fa-play m-r-10"></i>Watch video</a>
                                </div>
                                <dialog id="video-modal" class="video-modal" aria-label="{{$element->name}}">
                                    <button type="button" class="video-modal-close" aria-label="Close"><i class="fa fa-times"></i></button>
                                    <div class="video-modal-frame">
                                        <iframe title="{{$element->name}}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </dialog>
                            @endif
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

@section('scripts')
<script>
    (function () {
        var open = document.getElementById('video-modal-open');
        var modal = document.getElementById('video-modal');
        if (!open || !modal || !modal.showModal) return;
        var frame = modal.querySelector('iframe');

        open.addEventListener('click', function (e) {
            e.preventDefault();
            frame.src = 'https://www.youtube-nocookie.com/embed/' + open.dataset.videoId + '?autoplay=1&rel=0';
            modal.showModal();
        });
        // backdrop clicks land on the dialog itself
        modal.addEventListener('click', function (e) {
            if (e.target === modal || e.target.closest('.video-modal-close')) modal.close();
        });
        // stop playback when closed (button, backdrop or ESC)
        modal.addEventListener('close', function () {
            frame.src = 'about:blank';
        });
    })();
</script>
@stop
