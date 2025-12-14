<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dimitris Lyacos - Information and Resources on the Contemporary Author</title>
    <link rel="canonical" href="{{config('app.url')}}">
    <meta name="description" content="Official compendium of information and resources on the contemporary author Dimitris Lyacos. Along with news on current publications, here you will find regular updates on readings and other events as well as reviews and interviews in poetry journals and other literary sources.">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{config('app.name')}}">
<meta name="twitter:description" content="A Compendium of Information and Resources on the Contemporary Author">
<meta name="twitter:image" content="{{asset('images/home/dimitri-lyacos-official-website-bg-2.jpg')}}">
<meta property="og:title" content="{{config('app.name')}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{config('app.url')}}" />
<meta property="og:description" content="Official compendium of information and resources on the contemporary author Dimitris Lyacos. Along with news on current publications, here you will find regular updates on readings and other events as well as reviews and interviews in poetry journals and other literary sources." />
<meta property="og:image" content="{{asset('images/home/dimitri-lyacos-official-website-bg-2.jpg')}}" />


<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "{{config('app.url')}}",
  "name": "Dimitris Lyacos - A Compendium of Information and Resources on the Contemporary Author",
   "author": {
      "@type": "Person",
      "name": "Dimitris Lyacos"
    },
  "description": "Official compendium of information and resources on the contemporary author Dimitris Lyacos. Along with news on current publications, here you will find regular updates on readings and other events as well as reviews and interviews in poetry journals and other literary sources.",
  "publisher": "publisher name",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{config('app.url')}}/results?q={search_term}",
    "query-input": "required name=search_term" }
    }
</script>

<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Person",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Colorado Springs",
        "addressRegion": "CO",
        "postalCode": "80840",
        "streetAddress": "100 Main Street"
      },
      "email": "mailto:dimitris@lyacos.net",
      "image": "{{config('app.url')}}/images/about/small/post-modern-poetry.jpg",
      "jobTitle": "Author",
      "name": "Dimitris Lyacos",
      "url": "{{config('app.url')}}/about-and-press",
        "sameAs" : [
        "https://en.wikipedia.org/wiki/Dimitris_Lyacos"
        ]
    }
    </script>

    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/min.css')}}" rel="stylesheet">
</head>
<body>


    <div id="wrapper">

        <header id="header" class="header-fullwidth dark">
            <div id="header-wrap">
                <div class="container">
                    @include('elements.menu')
                </div>
            </div>
        </header>


    <div id="slider" class="inspiro-slider arrows-large arrows-creative dots-creative" data-height-xs="360" data-autoplay="true" data-autoplay-timeout="5000">


        <div class="slide background-overlay-one" style="background-image:url({{asset('images/home/dimitri-lyacos-official-website-bg-2.jpg')}});">
            <div class="container">
                <div class="slide-captions text-left">
                    <h1>DIMITRIS <br>LYACOS</h1>
                </div>
            </div>
        </div>

        <div class="slide background-overlay-one" style="background-image:url({{asset('images/home/trilogy.jpg')}});">
            <div class="container">
                <div class="slide-captions text-right">
                    <h2 style="font-size:600%">3-BOOK BOX SET</h2>
                    <h1 class="bigger">THE TRILOGY</h1>
                </div>
            </div>
        </div>

        <div class="slide background-overlay-one" style="background-image:url({{asset('images/home/z213-exit-poena-damni-dimitris-lyacos-cover-bg.jpg')}});">
            <div class="container">
                <div class="slide-captions text-center">
                    <h2>POENA DAMNI</h2>
                    <h1 class="bigger">Z213: EXIT</h1>
                </div>
            </div>
        </div>
        <div class="slide background-overlay-one" style="background-image:url({{asset('images/home/with-the-people-from-the-bridge-poena-damni-dimitris-lyacos-cover-bg.jpg')}});">
            <div class="container">
                <div class="slide-captions text-center">
                    <h2>POENA DAMNI</h2>
                    <h1>WITH THE PEOPLE FROM THE BRIDGE</h1>

                </div>
            </div>
        </div>
        <div class="slide background-overlay-one" style="background-image:url({{asset('images/home/the-first-death-poena-damni-dimitris-lyacos-cover-bg.jpg')}});">
            <div class="container">
                <div class="slide-captions text-center">
                    <h2>POENA DAMNI</h2>
                    <h1>THE FIRST DEATH</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="p-b-0">
        <div class="container">
            <div class="heading text-left">
                <span class="lead">Welcome to the official compendium of information and resources on the contemporary author <b>Dimitris Lyacos</b>. Along with news on current publications, here you will find regular updates on readings and other events as well as reviews and interviews in journals and other literary sources.</span>
            </div>
        </div>
    </section>

    <section class="p-t-0">
        <div class="container">
            <div class="row">
                <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                    @foreach($books as $book)
                        <div class="portfolio-item img-zoom no-overlay">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <a href="{{$book->uri}}"><img src="{{$book->display}}" alt="{{$book->name}}"></a>
                                </div>
                                <div class="portfolio-description book-description">
                                    <a href="{{$book->uri}}">
                                        <h3>{{$book->name}}</h3>
                                        <span>{{$book->h2}}</span>
                                        <p>{{  substr($book->description, 0,strpos($book->description, "."))}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="p-t-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <h4 class="asH3">Latest News</h4>
                        <div id="portfolio" class="grid-layout portfolio-1-columns" data-margin="20">
                            @foreach($collection as $element)

                                <div class="portfolio-item no-overlay no-cursor">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-description text-left portfolio-padding">
                                            <a href="{{$element->uri}}">
                                                @if($element->directory == 'reviews')
                                                    <h3>{{$element->h2}}
                                                        <br><small>{{$element->name}}</small>
                                                    </h3>
                                                @elseif($element->directory == 'translations')
                                                    <h3>{{$element->name}} {{ucfirst($element->language->name) }} Edition
                                                        <br><small>{{$element->h2}}. Translated by {{$element->translated_by}}, Published by: {{$element->publisher}}</small>
                                                    </h3>
                                                @elseif($element->directory == 'books')
                                                    <h3>{{$element->name}}
                                                        <br><small>{{$element->h2}}. {{$element->book_edition}} Revised Edition, Published by: {{$element->publisher}}</small>
                                                    </h3>

                                                @else
                                                    <h3>{{$element->name}}
                                                        <br><small>{{$element->h2}}</small>
                                                    </h3>
                                                @endif
                                            </a>
                                            <span>{{$element->published_at->format('M Y')}}</span> |
                                            @if($element->directory == 'translations')
                                                <span class="uppercase bold">BOOKS</span>
                                            @elseif($element->directory == 'readings')
                                                <span class="uppercase bold">READINGS & EVENTS</span>
                                            @else
                                            <a href="{{$element->uri}}">
                                            	<span class="uppercase bold">{{str_replace("-", " ", $element->directory) }}</span></a>
                                            @endif

                                            @if($element->directory == 'translations' || $element->directory == 'books')
                                            	<p class="smallerLineHeigh">{{ $element->trecento }}</p>

                                            @else
                                            <a href="{{$element->uri}}">
                                            	<p class="smallerLineHeigh" style="display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;  overflow: hidden;">{!!strip_tags($element->description, '<a>')!!}</p>
                                              </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

            </div>
        </div>
    </section>





    @include('elements.footer')
    </div>
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('js/min.js')}}"></script>
</body>
</html>
