<div class="content col-md-9 prodotti">
       

    <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
        @foreach($elements as $reading)

            <div class="portfolio-item no-overlay no-cursor">
                <div class="portfolio-item-wrap">

                    <div class="portfolio-description text-left">
                        <a href="{{$reading->reading_slug}}">
                            <h3>{{$reading->name}}<br>
                                <small>
                                    {{$reading->h2}}

                                    @if($reading->location)
                                    <br><b style="font-size: 20px;">{{$reading->location}}, {{$reading->country}}</b>
                                    @endif

                                </small>
                                @if(! \Auth::guest()) 
                                    <a class="btn btn-xxs btn-success" href="{{url('readings/'.$reading->slug.'/edit')}}">Edit</a>
                                @endif
                            </h3>
                        </a> 

                        <span>{{$reading->published_at->format('d M Y')}}</span> 
                        <p class="smallerLineHeigh">{{strip_tags($reading->description)}}</p>
                       
                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>