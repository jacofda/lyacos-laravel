<?php

namespace App\Models;

use Carbon\Carbon;

class Form extends Primitive
{

    public function books()
    {
        return $this->belongsToMany(Book::class);
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
    	return $this->directory . '/' . $this->slug;
    }

}
