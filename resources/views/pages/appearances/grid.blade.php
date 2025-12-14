<div class="content col-md-9 prodotti">
       

    <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
        @foreach($elements as $appearance)

            <div class="portfolio-item no-overlay">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-description text-left">
                        <a href="{{$appearance->uri}}">
                            <h3>{{$appearance->name}} <br>
                                <small>
                                    {{$appearance->h2}}
                                        @if($appearance->location)
                                        <br><b style="font-size: 17px;">{{$appearance->location}}</b>
                                        @endif
                                </small>
                            </h3>
                        </a> 
                        <span>{{$appearance->published_at->format('M Y')}}</span> 
                        @if($appearance->type)
                        |  <span>Media: {{$appearance->type}}</span>
                        @endif
                        <p class="smallerLineHeigh">{{$appearance->trecento}}</p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>