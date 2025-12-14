<section class="p-b-0">
    <div class="container">
        <div class="row m-b-40">

@if( !is_null($latestReview) && !is_null($extract) && !is_null($latestPublication) )
    <div class="col-sm-4">
        <h3 class="pageH3">Read Excerpts <span class="label label-small"><a href="{{url('books/excerpts/english')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$extract->name}}<br>
                <small>{{$extract->h2}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('excerpts/'.$extract->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($extract->link_url)
                <a target="_BLANK" class="btn" href="{{$extract->link_url}}">
                    @if(strlen($extract->link_text) > 24)
                        Read from <br>{{$extract->link_text}}
                    @else
                        Read from {{$extract->link_text}}
                    @endif
                </a>
            @else
                <a class="btn" href="{{$extract->uri}}">Read {{$extract->name}}</a>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <h3 class="pageH3">Publications <span class="label label-small"><a href="{{url('publications')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$latestPublication->name}}<br>
                <small>{{$latestPublication->h2}} | {{$latestPublication->published_at->format('M Y')}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('publications/'.$extract->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($latestPublication->link_url)
                <a target="_BLANK" class="btn" title="external link to {{$latestPublication->link_text}}" href="{{$latestPublication->link_url}}">
                    @if(strlen($latestPublication->link_text) > 24)
                        Read from <br>{{$latestPublication->link_text}}
                    @else
                        Read from {{$latestPublication->link_text}}
                    @endif
                </a>
            @else
                <a class="btn" href="{{$latestPublication->uri}}">Read {{$latestPublication->name}}</a>
            @endif
        </div>
    </div>

    <div class="col-sm-4">
        <h3 class="pageH3">Latest Review <span class="label label-small"><a href="{{url('reviews')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$latestReview->name}}<br>
                <small>{{$latestReview->h2}} | {{$latestReview->published_at->format('M Y')}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('reviews/'.$latestReview->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($latestReview->link_url)
                <a target="_BLANK" class="btn" title="external link to {{$latestReview->link_text}}" href="{{$latestReview->link_url}}">
                    @if(strlen($latestReview->link_text) > 24)
                        Read from <br>{{$latestReview->link_text}}
                    @else
                        Read from {{$latestReview->link_text}}
                    @endif
                </a>
            @else
                <a class="btn" href="{{$latestReview->uri}}">Read {!!$latestReview->name!!}</a>
            @endif
        </div>
    </div>

@elseif( is_null($latestReview) && !is_null($extract) && !is_null($latestPublication) )

    <div class="col-sm-6">
        <h3 class="pageH3">Read Excerpts <span class="label label-small"><a href="{{url('books/excerpts')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$extract->name}}<br>
                <small>{{$extract->h2}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('excerpts/'.$extract->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($extract->link_url)
                <a target="_BLANK" class="btn" href="{{$extract->link_url}}">Read from {{$extract->link_text}}</a>
            @else
                <a class="btn" href="{{$extract->uri}}">Read {{$extract->name}}</a>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <h3 class="pageH3">Publications <span class="label label-small"><a href="{{url('publications')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$latestPublication->name}}<br>
                <small>{{$latestPublication->h2}} | {{$latestPublication->published_at->format('M Y')}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('publications/'.$extract->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($latestPublication->link_url)
                <a target="_BLANK" class="btn" title="external link to {{$latestPublication->link_text}}" href="{{$latestPublication->link_url}}">Read from {{$latestPublication->link_text}}</a>
            @else
                <a class="btn" href="{{$latestPublication->uri}}">Read {{$latestPublication->name}}</a>
            @endif
        </div>
    </div>
@elseif( is_null($latestReview) && is_null($extract) && !is_null($latestPublication) )

    <div class="col-sm-6 col-sm-offset-3 text-center">
        <h3 class="pageH3">Latest Publication <span class="label label-small"><a href="{{url('publications')}}">see all</a></span></h3>
        <div class="project-description">
            <h4 class="pageH4">{{$latestPublication->name}}<br>
                <small>{{$latestPublication->h2}} | {{$latestPublication->published_at->format('M Y')}}
                    @if(! \Auth::guest())
                        <a class="green" href="{{url('publications/'.$extract->slug.'/edit')}}">Edit</a>
                    @endif
                </small></h4>
            @if($latestPublication->link_url)
                <a target="_BLANK" class="btn" title="external link to {{$latestPublication->link_text}}" href="{{$latestPublication->link_url}}">Read from {{$latestPublication->link_text}}</a>
            @else
                <a class="btn" href="{{$latestPublication->uri}}">Read {{$latestPublication->name}}</a>
            @endif
        </div>
    </div>

@endif

                </div>
            </div>

            <div class="post-navigation">
                <a href="{{$element->prev->uri}}" class="post-prev">
                    <div class="post-prev-title"><span>Previous {{\Str::singular($element->directory)}}</span>{{$element->prev->name}}</div>
                </a>

                <a href="{{url('books')}}" class="post-all" title="all books">
                    <i class="fa fa-th"></i>
                </a>


                <a href="{{$element->next->uri}}" class="post-next">
                    <div class="post-next-title"><span>Next {{\Str::singular($element->directory)}}</span>{{$element->next->name}}</div>
                </a>
            </div>

        </section>
