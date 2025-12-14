<?php

namespace App\Models;

use Carbon\Carbon;

class Book extends Primitive
{

    public function publications()
    {
    	return $this->belongsToMany(Publication::class);
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }

    public function formats()
    {
        return $this->belongsToMany(Format::class);
    }

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }

    public function excerpts()
    {
        return $this->hasMany(Excerpt::class);
    }

	public function setPublishedAtAttribute($value)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat( 'd/m/Y H:i', '01/'.$value.' 00:00' );
	}

    public function getPublishedAtAttribute()
    {
        return Carbon::parse($this->attributes['published_at']);
    }

	public function setPriceAttribute($value)
	{
		$this->attributes['price'] = is_null($value) ? null : $value*100;
	}

    public function getPriceAttribute()
    {
    	return is_null($this->attributes['price']) ? null : number_format($this->attributes['price']/100, 2, '.', '');
    }

    public function getNameAttribute()
    {
        return strtoupper($this->attributes['name']);
    }

    public function getUrlAttribute()
    {
    	return $this->directory . '/english/' . $this->slug;
    }

    public function getCoverAttribute()
    {
        if ( $this->media()->where('type', 'cover')->exists() )
        {
            return asset('storage/'.$this->directory.'/display/'.$this->media()->where('type', 'cover')->orderBy('media_order', 'ASC')->first()->filename);
        }
        return "http://via.placeholder.com/510x810";
    }

}
