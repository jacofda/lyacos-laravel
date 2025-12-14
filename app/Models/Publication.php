<?php

namespace App\Models;

use Carbon\Carbon;

class Publication extends Primitive
{

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

	public function setPublishedAtAttribute($value)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat( 'd/m/Y H:i', '01/'.$value.' 00:00' );
	}

    public function getPublishedAtAttribute()
    {
        return Carbon::parse($this->attributes['published_at']);
    }

    public function getUrlAttribute()
    {
    	return $this->directory . '/' . $this->type .'/' . $this->slug;
    }

    public function getInterviewTitleAttribute()
    {
        if(strpos($this->name, 'INTERVIEW - ') !== false)
        {
            return str_replace('INTERVIEW - ', '', $this->name);
        }
        return $this->name;
    }

}
