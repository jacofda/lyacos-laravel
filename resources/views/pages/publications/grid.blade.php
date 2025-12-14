<div class="content col-md-9 prodotti">

    <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
        @foreach($elements as $publication)

            <div class="portfolio-item no-overlay no-cursor">
                <div class="portfolio-item-wrap">

                    <div class="portfolio-description text-left">

                        @if(! is_null($publication->link_url) && strlen($publication->description) < 88 )
                            <a target="_BLANK" rel="nofollow" href="{{$publication->link_url}}">
                                <h3>{{$publication->name}} <br>
                                    <small>
                                        {{$publication->h2}} [external link]
                                        @if($publication->location)
                                            <br><b style="font-size: 17px;">{{$publication->location}}</b>
                                        @endif
                                    </small>
                                    @if(! \Auth::guest())
                                        <a class="btn btn-xxs btn-success" href="{{url('publications/'.$publication->slug.'/edit')}}">Edit</a>
                                        <a class="btn btn-xxs btn-primanry" href="{{$publication->uri}}">View</a>
                                    @endif
                                </h3>
                            </a>
                        @else
                            <a href="{{$publication->uri}}">
                                <h3>{{$publication->name}}
                                    <br>
                                    <small>
                                        {{$publication->h2}}
                                        @if($publication->location)
                                            <br><b style="font-size: 17px;">{{$publication->location}}</b>
                                        @endif
                                    </small>
                                    @if(! \Auth::guest())
                                        <a class="btn btn-xxs btn-success" href="{{url('publications/'.$publication->slug.'/edit')}}">Edit</a>
                                    @endif
                                </h3>
                            </a>
                        @endif

                        <span>{{$publication->published_at->format('M Y')}}</span>
                        @if($publication->language_id != 1)
                        | <span>lang: {{$publication->language->format_639_2t}}</span>
                        @endif
                        <p class="smallerLineHeigh">{{str_replace("&nbsp;", " ", strip_tags($publication->description))}}</p>

                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>
