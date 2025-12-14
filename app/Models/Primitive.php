<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\{Apperance, Book, Excerpt, Format, Form, Language, Publication, Reading, Review, Translation};

class Primitive extends Model
{
	use Sluggable, SluggableScopeHelpers;

    protected $guarded = array();

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

//eloquent
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

//helpers
    public function getClassAttribute()
    {
        return str_replace( "App\\Models\\", "" , get_class($this) );
    }

    public function getDirectoryAttribute()
    {
        if( strpos($this->class, 'Apperance') !== false)
        {
            return 'media-appearances';
        }
        elseif( strpos($this->class, 'Form') !== false )
        {
            return 'the-trilogy-in-other-media';
        }
        return \Str::plural( strtolower($this->class) );
    }

    public function getUriAttribute()
    {
        if ( strpos( url()->current(), "index.php" ) !== false )
        {
            return str_replace("index.php", "", url()->current()).$this->url;
        }
        return url($this->url);
    }

    public function getPrevAttribute()
    {
        if( $this->id == 1 )
        {
            return self::find( self::orderBy('id', 'DESC')->first()->id );
        }
        return self::find(self::where('id', '<', $this->id)->max('id'));

    }

    public function getNextAttribute()
    {
        if( $this->id == self::orderBy('id', 'DESC')->first()->id )
        {
            return self::find(1);
        }
        return self::find(self::where('id', '>', $this->id)->min('id'));
    }

    public function getCentocinquantaAttribute()
    {
        $description = strip_tags($this->description);

        if ( strlen($description) > 146 )
        {
            $pos = strpos($description, ' ', 145);
            return substr($description, 0, $pos).' ...';
        }

        return $description;
    }

    public function getTrecentoAttribute()
    {
        $description = strip_tags($this->description);

        if ( strlen($description) > 296 )
        {
            $pos = strpos($description, ' ', 295);
            return substr($description, 0, $pos).' ...';
        }

        return $description;
    }

    public static function findModelFromRequest($mediable_type, $mediable_id = null)
    {

    	if( is_null($mediable_id) )
    	{
    		$mediable_id = 1;
    	}

    	if ( $mediable_type == "App\Models\Publication" )
    	{
    		return Publication::find($mediable_id);
    	}
        elseif( $mediable_type == "App\Models\Book" )
        {
            return Book::find($mediable_id);
        }
        elseif( $mediable_type == "App\Models\Translation" )
        {
            return Translation::find($mediable_id);
        }
    	elseif( $mediable_type == "App\Models\Excerpt" )
    	{
    		return Excerpt::find($mediable_id);
    	}
    	elseif( $mediable_type == "App\Models\Reading" )
    	{
    		return Reading::find($mediable_id);
    	}
    	elseif( $mediable_type == "App\Models\Review" )
    	{
    		return Review::find($mediable_id);
    	}
    	elseif( $mediable_type == "App\Models\Apperance" )
    	{
    		return Apperance::find($mediable_id);
    	}
        elseif( $mediable_type == "App\Models\Form" )
        {
            return Form::find($mediable_id);
        }
    	return null;
    }

// IMAGES


    public function getSectionBackgroundAttribute()
    {
        if ( $this->media()->where('type', 'background')->exists() )
        {
            return 'transparent';
        }
        return 'app';
    }

    public function getBackgroundAttribute()
    {
        if ( $this->media()->where('type', 'background')->exists() )
        {
            return asset('storage/'.$this->directory.'/full/'.$this->media()->where('type', 'background')->first()->filename);
        }
        return false;
    }

    public function getFullAttribute()
    {
        if ( $this->media()->where('mime', 'image')->exists() )
        {
            return asset('storage/'.$this->directory.'/full/'.$this->media()->where('mime', 'image')->orderBy('media_order', 'ASC')->first()->filename);
        }
        return "http://via.placeholder.com/1920x1080";
    }

    public function getDisplayAttribute()
    {
        if ( $this->media()->where('mime', 'image')->exists() )
        {
            return asset('storage/'.$this->directory.'/display/'.$this->media()->where('mime', 'image')->orderBy('media_order', 'ASC')->first()->filename);
        }
        return "http://via.placeholder.com/810x510";
    }

    public function getThumbAttribute()
    {
        if ( $this->media()->where('mime', 'image')->exists() )
        {
            return asset('storage/'.$this->directory.'/thumbs/'.$this->media()->where('mime', 'image')->orderBy('media_order', 'ASC')->first()->filename);
        }
        return "http://via.placeholder.com/100x100";
    }

    public function getImagesAttribute()
    {
        if ( $this->media()->where('mime', 'image')->exists() )
        {
            return $this->media()->where('mime', 'image')->orderBy('media_order', 'ASC')->get();
        }
        return null;
    }

    public function getDocsAttribute()
    {
        if ( $this->media()->where('mime', 'docs')->exists() )
        {
            return $this->media()->where('mime', 'docs')->latest()->get();
        }
        return null;
    }


}
