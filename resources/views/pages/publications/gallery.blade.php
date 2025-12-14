@if( $element->media()->count() == 1 )

    <div class="grid-item large-width">
        <a title="{{$element->name}}" data-lightbox="gallery-item" href="{{$element->full}}">
            <img src="{{$element->full}}" alt="{{$element->h2}}">
        </a>
    </div>

@elseif( $element->media()->count() == 2 || $element->media()->count() == 4 )
	
	@foreach($element->media()->orderBy('media_order', 'ASC')->get() as $image)
	    <div class="grid-item">
	        <a title="{{$image->description}}" data-lightbox="gallery-item" href="{{$image->full}}">
	            <img src="{{$image->display}}" alt="{{$image->description}}">
	        </a>
	    </div>
	@endforeach

@elseif( $element->media()->count() == 3 || $element->media()->count() == 5)

	@foreach($element->media()->orderBy('media_order', 'ASC')->get() as $image)
		@if($loop->iteration == 1)
		    <div class="grid-item large-width">
		        <a title="{{$image->name}}" data-lightbox="gallery-item" href="{{$image->full}}">
		            <img src="{{$image->full}}" alt="{{$image->description}}">
		        </a>
		    </div>
		@else
		    <div class="grid-item">
		        <a title="{{$image->description}}" data-lightbox="gallery-item" href="{{$image->full}}">
		            <img src="{{$image->display}}" alt="{{$image->description}}">
		        </a>
		    </div>
		@endif
	@endforeach

@elseif( $element->media()->count() > 5 )

	@if( $element->media()->count() % 2 == 0 )

		@foreach($element->media()->orderBy('media_order', 'ASC')->get() as $image)
		    <div class="grid-item">
		        <a title="{{$image->description}}" data-lightbox="gallery-item" href="{{$image->full}}">
		            <img src="{{$image->display}}" alt="{{$image->description}}">
		        </a>
		    </div>
		@endforeach

	@else

		@foreach($element->media()->orderBy('media_order', 'ASC')->get() as $image)
			@if($loop->iteration == 1)
			    <div class="grid-item large-width">
			        <a title="{{$image->name}}" data-lightbox="gallery-item" href="{{$image->full}}">
			            <img src="{{$image->full}}" alt="{{$image->description}}">
			        </a>
			    </div>
			@else
			    <div class="grid-item">
			        <a title="{{$image->description}}" data-lightbox="gallery-item" href="{{$image->full}}">
			            <img src="{{$image->display}}" alt="{{$image->description}}">
			        </a>
			    </div>
			@endif
		@endforeach

	@endif

@endif