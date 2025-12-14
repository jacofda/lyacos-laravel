<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
	protected $guarded = array();

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function translations()
    {
        return $this->belongsToMany(Translation::class);
    }

}
