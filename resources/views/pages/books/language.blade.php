@extends('layouts.app')
@section('meta')
<title>All Books in {{ucfirst($language)}} - Poena Damni Trilogy - {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}books/{{$language}}">
@if($language == 'english')
<meta name="description" content="Poena Damni Trilogy Dimitris Lyacos. THE FIRST DEATH, WITH THE PEOPLE FROM THE BRIDGE, Z213: EXIT. Translated By SHORSHA SULLIVAN, SHOESTRING PRESS.">
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@graph": [
    {
      "@id": "#author",
      "@type": "Person",
      "name": "Dimitris Lyacos",
      "sameAs": "https://en.wikipedia.org/wiki/Dimitris_Lyacos"
    },
    {
      "@id": "#trilogy",
      "@type": "Book",
      "about": "http://id.worldcat.org/fast/1020337",
      "hasPart": [
        {
          "@id": "#book3",
          "@type": [
            "Book",
            "PublicationVolume"
          ],
          "name": "THE FIRST DEATH",
          "about": "{{config('app.url')}}books/english/the-first-death",
          "isPartOf": "#trilogy",
          "inLanguage": "en",
          "volumeNumber": "3",
          "author": "#author"
        },
        {
          "@id": "#book2",
          "@type": [
              "Book",
              "PublicationVolume"
          ],
          "name": "WITH THE PEOPLE FROM THE BRIDGE",
          "about": "{{config('app.url')}}books/english/with-the-people-from-the-bridge",
          "isPartOf": "#trilogy",
          "inLanguage": "en",
          "volumeNumber": "2",
          "author": "#author"
        },
        {
          "@id": "#book1",
          "@type": [
            "Book",
            "PublicationVolume"
          ],
          "name": "Z213: EXIT",
          "about": "{{config('app.url')}}books/english/z213-exit",
          "isPartOf": "#trilogy",
          "inLanguage": "en",
          "volumeNumber": "1",
          "author": "#author"
        }
      ],
      "name": "Poena Damni",
      "inLanguage": "en",
      "genre": "Cross-genre",
      "author": "#author"
    }
  ]
}
</script>

@else
@endif
@stop

@section('content')
	<section id="page-title" class="page-title-classic">

        <div class="container">
                @if(!\Auth::guest())
                 <div class="breadcrumb">
                	<a href="{{url('admin/books')}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Admin Books</a>
                </div>
                @endif

            <div class="page-title">
                <h1>Books in {{ucfirst($language)}}</h1>
                @if($language != 'greek')
                    <h2>DIMITRIS LYACOS' BOOKS TRANSLATED IN {{ucfirst($language)}}</h2>
                @else
                    <h2>All Dimitris Lyacos' Books in {{ucfirst($language)}}</h2>
                @endif
            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li><a href="{{url('/books')}}"> Books</a> </li>
		          <li class="active">{{ucfirst($language)}}</li>
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
                @if($elements->isEmpty())
                    @if($language == 'portuguese')

                        <h3>THE TRILOGY IN PORTUGUESE - FORTHCOMING</h3>
                        <small>BY <a target="_BLANK" href="https://www.relicarioedicoes.com">RELICARIO EDICOES</a>, BRAZIL, DECEMBER 2021</small>
                        <h4>TRANSLATED BY JOSE LUIS COSTA</h4>


                    @elseif($language == 'turkish')


                        <h3>THE TRILOGY IN TURKISH - FORTHCOMING</h3>
                        <small>BY <a target="_BLANK" href="https://canyayinlari.com/aboutus/">CAN PUBLISHING</a>, ISTANBUL, NOVEMBER 2022</small>
                        <h4>TRANSLATED BY ARZU EKER</h4>

                    @endif
                @else
                @foreach($elements as $element)
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="portfolio-item no-overlay p-0">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="{{$element->uri}}">
                                        	<img src="{{$element->display}}" alt="{{$element->name}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-4">
                                <div class="portfolio-attributes style2 p-3">
                                    <div class="attribute"><strong>Title:</strong> {{$element->name}}</div>
                                    <div class="attribute"><strong>Publisher:</strong> {{$element->publisher}}</div>
                                    <div class="attribute"><strong>Translated by:</strong> {{$element->translated_by}}</div>
                                    <div class="attribute"><strong>Published: </strong>{{$element->published_at->format('M Y')}}</div>
                                    <div class="attribute"><strong>Edition: </strong> {{$element->book_edition}} Edition</div>
                                </div>
                            </div>
                            <div class="col-sm-8 pt-3 project-description">
                                @if ( strpos($element->description, ".") !== false )
                                    <h3 class="p15">{{  substr($element->description, 0,strpos($element->description, "."))}}.</h3>
                                @else
                                    <h3 class="p15">{!! strip_tags($element->description) !!}</h3>
                                @endif
                                <a href="{{$element->uri}}" class="btn btn-dark btn-outline mt-25">{{$element->name}}</a>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div><hr><div class="clearfix"></div>
                @endforeach
                @endif
            </div>
        </div>
    </section>


@stop
