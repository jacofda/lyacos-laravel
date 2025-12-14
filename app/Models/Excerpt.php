<?php

namespace App\Models;

class Excerpt extends Primitive
{
	public function book()
	{
		return $this->belongsTo(Book::class);
	}

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function getUrlAttribute()
    {
    	return 'books/' . $this->directory . '/' . $this->slug;
    }

}
