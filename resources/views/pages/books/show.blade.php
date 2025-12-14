@extends('layouts.app')
@section('meta')
<title>{{$element->name}} {{$element->h2}} - {{config('app.name')}}</title>
<meta name="description" content="{{$element->trecento}}">
<link rel="canonical" href="{{$element->uri}}">
<meta itemprop="name" content="{{$element->name}} - {{config('app.name')}}">
<meta itemprop="description" content="{{$element->trecento}}">
<meta itemprop="image" content="{{$element->cover}}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$element->name}} - {{config('app.name')}}">
<meta name="twitter:description" content="{{$element->trecento}}">
<meta name="twitter:image" content="{{$element->cover}}">
<meta property="og:title" content="{{$element->name}} - {{config('app.name')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{$element->uri}}" />
<meta property="og:description" content="{{$element->trecento}}" /> 
<meta property="og:image" content="{{$element->cover}}" /> 


<script type="application/ld+json">
{
      "@context": "http://schema.org",
      "@type": "WebPage",
      "breadcrumb": "Books > Literature > Cross-genre",
      "mainEntity":{
              "@type": "Book",
              "author": "{{config('app.url')}}/about-and-press",
              "bookFormat": "http://schema.org/Paperback",
              "datePublished": "{{$element->published_at->format('Y-m-d')}}",
              "image": "{{$element->cover}}",
              "inLanguage": "English",
              "isbn": "{{$element->isbn}}",
              "name": "{{$element->name}}",
              "numberOfPages": "{{$element->number_of_pages}}",
              "offers": {
                "@type": "Offer",
                "availability": "http://schema.org/InStock",
                "price": "{{$element->price}}",
                "priceCurrency": "{{$element->currency}}"
              },
              "publisher": "{{$element->publisher}}"
            }
    }
</script>


@stop

@section('content')

	<section id="page-title" class="darker" data-parallax-image="{{$element->background}}">

        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{$element->uri.'/edit'}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a><a href="{{$element->uri.'/media'}}" class="btn btn-xs btn-warning"><i class="fa fa-image"></i>Image</a>
                </div>
                @endif
            
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
		          <li><a href="{{url('books')}}">Books</a> </li>
                  <li><a href="{{url('books/english')}}">English</a> </li>
		          <li class="active">{{$element->name}}</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>



   <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
						<img class="img-responsive" src="{{$element->cover}}" alt="cover {{$element->name}}">
                    </div>

                    <div class="col-md-3">
                        <div class="portfolio-attributes style2 p-3 pt-0">
                            <div class="attribute"><strong>Title:</strong> {{$element->name}}</div>
                            <div class="attribute"><strong>Publisher:</strong> {{$element->publisher}}</div>
                            <div class="attribute"><strong>Translated by:</strong> {{$element->translated_by}}</div>
                            <div class="attribute"><strong>Published: </strong>{{$element->published_at->format('M Y')}}</div>
                            <div class="attribute"><strong>Edition: </strong> {{$element->book_edition}} Edition</div>
                            <div class="attribute"><strong>Pages: </strong> {{$element->number_of_pages}}</div>
                            <div class="attribute"><strong>Format: </strong> 
                                @foreach($element->formats as $format)
                                    @if($loop->last)
                                        {{$format->name}}
                                    @else
                                        {{$format->name}} or
                                    @endif
                                @endforeach
                            </div>
                            <div class="attribute"><strong>ISBN: </strong> {{$element->isbn}}</div>
                        </div>
                        <div class="p-3"> <a target="_BLANK" href="{{$element->buy_link}}" class="btn btn-dark btn-outline">Buy on {{$element->buy_text}}</a></div>
                    </div>



                    <div class="col-md-5">
                        <div class="project-description">
                            <h3 class="p15"> {!! $element->description !!}</h3>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        @if($element->translations()->exists())
        <section>
            <div class="row">
                <div class="col-sm-12 center">
                    @foreach($element->translations as $translation)
                        <div>

                            <a href="{{$translation->uri}}" class="btn btn-light btn-creative btn-shadow btn-light-hover">Available in {{$translation->language->name}} <strong><em>{{$translation->name}}</em></strong></a>
{{--                             <a href="{{$translation->uri}}" class="btn btn-dark btn-outline">Also available in {{$translation->language->name}}: {{$translation->name}}</a></div>
 --}}                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($element->cover_review)
        <section id="page-content" class="p-b-0 pt-5">
            <div class="row">
                <div class="col-sm-12 center">
                    <div class="hr-title hr-long center"><abbr>Book Reviews</abbr> </div>
                        <div class="carousel testimonial testimonial-border" data-margin="20" data-arrows="false" data-loop="true" data-autoplay="true" data-items="3" data-equalize-item=".testimonial-item">
                        @foreach( json_decode( $element->cover_review ) as $review)

                            <div class="testimonial-item">
                                <p>{{$review->text}}</p>
                                <span>by <cite>{{$review->publisher}}</cite></span> 
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        
        @include('pages.books.latest')

@stop