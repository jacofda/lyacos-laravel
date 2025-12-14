<?php

namespace App\Models;

use Carbon\Carbon;

class Review extends Primitive
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
    	return $this->directory . '/' . $this->slug;
    }

    public function getPageBackgroundAttribute()
    {
        if ($this->books()->exists())
        {
            if( $this->books()->count() == 1 )
            {
                return $this->books()->first()->background;
            }
            return false;
        }
        return false;
    }


//json-ld
    public function getBookAttribute()
    {
        if($this->books()->exists())
        {
            return $this->books()->first();
        }
        return Book::find(3);
    }

    public function getOrganizationAttribute()
    {
        if($this->link_text)
        {
            return $this->link_text;
        }
        return $this->h2;
    }

    public function getJsonReviewAttribute()
    {
        $check = 0;
        if($this->link_text)
        {
            $check++;
        }
        if($this->books()->exists())
        {
            $check++;
        }
        if($this->reviewer)
        {
            $check++;
        }
        if($check == 3)
        {
            return true;
        }
        return false;
    }

}
