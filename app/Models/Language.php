<?php

namespace App\Models;

use Carbon\Carbon;

class Language extends Primitive
{
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
