@extends('layouts.app')


@section('meta')
<title>{{$element->name}} | {{config('app.name')}}</title>
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{config('app.url')}}publications/{{$element->type}}/{{$element->slug}}">
<meta itemprop="name" content="{{$element->name}} | {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} | {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta property="og:title" content="{{$element->name}} | {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{config('app.url')}}publications/{{$element->type}}/{{$element->slug}}" />
<meta property="og:description" content="{{$element->trecento}}" />

</script><script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "{{config('app.url')}}publications",
      "name": "Publications"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "{{config('app.url')}}publications/{{$element->type}}",
      "name": "{{ucfirst($element->type)}}"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "{{config('app.url')}}publications/{{$element->type}}/{{$element->slug}}",
      "name": "{{$element->name}}"
    }
  }]
}
</script>

@stop

@section('content')

    @if($element->books()->exists())
        <section id="page-title" class="darker" data-parallax-image="{{$element->books()->first()->background}}">
    @else
        <section id="page-title" class="page-title-classic">
    @endif
        <div class="container">
            <div class="breadcrumb">
                @if(!\Auth::guest())
                    <a href="{{url('publications/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
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
                  <li><a href="{{url('publications')}}">Publications</a> </li>
                  <li><a href="{{url('publications/'.$element->type)}}">{{ucfirst($element->type)}}</a> </li>
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
                            <div class="attribute"><strong>Published:</strong> {{$element->published_at->format('M Y')}}</div>
                            <div class="attribute"><strong>Category:</strong> {{ucfirst($element->type)}}</div>
                            <div class="attribute"><strong>Language:</strong> {{ucfirst($element->language->name)}}</div>
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

@if($element->media()->exists())
    <div class="attribute">
        <strong>
            @if($element->books()->count() > 1)
                Attachements:
            @else
                Attachement:
            @endif
        </strong>
        @foreach($element->media as $media)
            @if($loop->last)
                <a href="https://lyacos.net/storage/publications/docs/{{$media->filename}}"><b>{{$media->description}}</b></a>
            @else
                <a href="https://lyacos.net/storage/publications/docs/{{$media->filename}}"><b>{{$media->description}}</b></a>,
            @endif
        @endforeach
    </div>
@endif

                        </div>


                    </div>
                    <div class="col-md-8">
                            <div class="project-description pt-4">
                                <h3>{!! strip_tags($element->description, '<a><b><br>') !!}</h3>
                            </div>
                            @if($element->link_url)
                            <div> <a title="external link {{$element->link_text}}" target="_BLANK" href="{{$element->link_url}}" class="btn btn-outline btn-dark btn-lg">{{$element->link_text}}</a></div>
                            @endif
                    </div>
                </div>
            </div>



            <div class="post-navigation">
                <a href="{{$element->prev->uri}}" class="post-prev" title="vedi portfolio {{$element->prev->name}}">
                    <div class="post-prev-title"><span>Previous</span>{{$element->prev->name}}</div>
                </a>
                <a href="{{url('publications')}}" class="post-all" title="all publications">
                    <i class="fa fa-th"></i>
                </a>
                <a href="{{$element->next->uri}}" class="post-next" title="vedi portfolio {{$element->next->name}}">
                    <div class="post-next-title"><span>Next</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>


@stop
