<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $guarded = array();

    public function getFullAttribute()
    {
        return asset('storage/'.$this->directory.'/full/'.$this->filename);
    }

    public function getDisplayAttribute()
    {
        return asset('storage/'.$this->directory.'/display/'.$this->filename);
    }

    public function getThumbAttribute()
    {
        return asset('storage/'.$this->directory.'/thumb/'.$this->filename);
    }

    public function getDirectoryAttribute()
    {
    	return \Str::plural( strtolower( str_replace("App\\", "" , $this->mediable_type) ) );
    }

    public function getSizeAttribute()
    {
        return $this->width.'x'.$this->height;
    }

}
