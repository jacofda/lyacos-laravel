<?php

namespace App\Models;

use Carbon\Carbon;

class Reading extends Primitive
{

    public function getPublishedAtAttribute()
    {
    	if( is_null($this->attributes['published_at']) )
    	{
    		return null;
    	}
        return Carbon::parse($this->attributes['published_at']);
    }

    public function getEndAtAttribute()
    {
    	if( is_null($this->attributes['end_at']) )
    	{
    		return null;
    	}
        return Carbon::parse($this->attributes['end_at']);
    }

    public function getReadingSlugAttribute()
    {
    	return config('app.url').'readings/'.$this->published_at->format('Y').'/'.$this->slug;
    }

    public function getUrlAttribute()
    {
        return 'readings/'.$this->published_at->format('Y').'/'.$this->slug;
    }

}
