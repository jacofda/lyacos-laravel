@extends('layouts.app')


@section('meta')
@if($element->json_review)
<title>Review: {{$element->name}} by {{$element->reviewer}} on {{$element->h2}} | {{config('app.name')}}</title>
@else
<title>Review: {{$element->name}} | {{config('app.name')}}</title>
@endif
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{config('app.url')}}reviews/{{$element->slug}}">
<meta itemprop="name" content="{{$element->name}} | {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} | {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta property="og:title" content="{{$element->name}} | {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content=""{{config('app.url')}}reviews/{{$element->slug}}"" />
<meta property="og:description" content="{{$element->trecento}}" />

@if($element->json_review)
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "Book",
    "image": "{{$element->book->cover}}",
    "name": "{{$element->book->name}}"
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "5"
  },
  "name": "{{$element->name}}",
  "author": {
    "@type": "Person",
    "name": "{{$element->reviewer}}"
  },
  "reviewBody": "{{$element->trecento}}",
  "publisher": {
    "@type": "Organization",
    "name": "{{$element->organization}}"
  }
}
</script>
@endif

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
                    <a href="{{url('reviews/'.$element->slug.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
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
                  <li><a href="{{url('reviews')}}">Reviews</a> </li>
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
                            @if($element->reviewer)
                                <div class="attribute"><strong>Reviewed by:</strong> {{$element->reviewer}}</div>
                            @endif
                            @if($element->language_id != 1)
                                <div class="attribute"><strong>Language:</strong> {{ucfirst($element->language->name)}}</div>
                            @endif
                            @if($element->books()->exists())
                                <div class="attribute">
                                    <strong>
                                        @if($element->books()->count() > 1)
                                            Review of books:
                                        @else
                                            Review of book:
                                        @endif
                                    </strong>
                                    @foreach($element->books as $book)
                                        @if($loop->last)
                                            {{$book->name}}
                                        @else
                                            {{$book->name}},
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="project-description pt-4">
                            @if( strlen($element->description) > 300 )
                                @if($element->id == 55)
                                    {!! $element->description !!}
                                @else
                                    <p class="asH3-description">{!! strip_tags($element->description, '<a><b><br>') !!}</p>
                                @endif
                            @else
                                <h3>{!! strip_tags($element->description, '<a><b><br>') !!}</h3>
                            @endif
                        </div>
                        @if($element->link_url)
                            <span class="uppercase p-1 mb-2">Read full review at: </span>
                            <div> <a rel="nofollow" title="external link {{$element->link_text}}" target="_BLANK" href="{{$element->link_url}}" class="btn btn-rounded">{!!$element->link_text!!}</a></div>
                        @endif
                    </div>
                </div>
            </div>



            <div class="post-navigation">
                <a href="{{$element->prev->uri}}" class="post-prev" title="vedi portfolio {{$element->prev->name}}">
                    <div class="post-prev-title"><span>Previous</span>{{$element->prev->name}}</div>
                </a>
                <a href="{{url('reviews')}}" class="post-all" title="all reviews">
                    <i class="fa fa-th"></i>
                </a>
                <a href="{{$element->next->uri}}" class="post-next" title="vedi portfolio {{$element->next->name}}">
                    <div class="post-next-title"><span>Next</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>


@stop
