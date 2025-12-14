<div class="content col-md-9 prodotti">


    <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
        @foreach($elements as $review)

            <div class="portfolio-item no-overlay">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-description text-left">
                        <a href="{{$review->uri}}">
                            <h3>{{$review->h2}} <br>
                                <small>
                                    {{$review->name}}
                                        @if($review->location)
                                        <br><b style="font-size: 17px;">{{$review->location}}</b>
                                        @endif
                                </small>
                            </h3>
                        </a>
                        <span>{{$review->published_at->format('M Y')}}</span>
                        @if($review->language_id != 1)
                        |  <span>lang: {{$review->language->format_639_2t}}</span>

                        @endif
                        @if($review->reviewer)
                        |  <span>by: {{$review->reviewer}}</span>
                        @endif
                        @if($review->location)
                        |  <span>{{$review->location}}</span>
                        @endif
                        <p class="smallerLineHeigh">{{$review->trecento}}</p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>
