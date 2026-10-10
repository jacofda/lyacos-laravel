<?php

namespace App\Models;

use Carbon\Carbon;

class Reading extends Primitive
{
    const YOUTUBE_REGEX = '~(?:youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/)|youtu\.be/)([\w-]{11})~i';

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

    public function getYoutubeIdAttribute()
    {
    	if( is_null($this->video_url) )
    	{
    		return null;
    	}
        preg_match(self::YOUTUBE_REGEX, $this->video_url, $matches);
        return $matches[1] ?? null;
    }

    public function getReadingSlugAttribute()
    {
    	return config('app.url').'/readings/'.$this->published_at->format('Y').'/'.$this->slug;
    }

    public function getUrlAttribute()
    {
        return 'readings/'.$this->published_at->format('Y').'/'.$this->slug;
    }

}
