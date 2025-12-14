<?php

namespace App\Libraries;

use App\Models\{Primitive, Media};
use App\Libraries\Types\{MediaPublication, MediaExcerpt, MediaBook, MediaForm};

class MediaHelper {

    public function saveImageOrFile($request)
    {
        if ( $request->hasFile('file') )
        {
            if ( $request->file->isValid() )
            {
                $filename = $this->makeNiceName($request, strtolower($request->file->getClientOriginalExtension()) );
                $request->file->storeAs('public/'.$request->directory.'/original', $filename );
                if ( $this->isImage($request->file) )
                {
                    if($directory = 'the-trilogy-in-other-media')
                    {
                        $media = new MediaForm;
                    }
                    else
                    {
                        $class = 'App\Libraries\Types\Media' . ucfirst( str_singular($request->directory) );
                        $media = new $class;
                    }


                    $media->resizeAndSaveImage($request->file, $filename, $request->directory);

                    $image = \Image::make( $request->file->getRealPath() );

                    Media::create([
                        'description' => $this->makeNiceDescription($request),
                        'mime' => "image",
                        'filename' => $filename,
                        'mediable_id' => $request->mediable_id,
                        'mediable_type' => $request->mediable_type,
                        'media_order' => $this->getMediaOrder($request->mediable_type, $request->mediable_id),
                        'width' => $image->width(),
                        'height' => $image->height()
                    ]);

                    return 'image saved';
                }

                $request->file->storeAs('public/'.$request->directory.'/docs', $filename );

                Media::create([
                    'description' => 'document ' . $this->makeNiceDescription($request),
                    'mime' => 'doc',
                    'filename' => $filename,
                    'mediable_id' => $request->mediable_id,
                    'mediable_type' => $request->mediable_type,
                    'media_order' => $this->getMediaOrder($request->mediable_type, $request->mediable_id)
                ]);

                return 'doc saved';

            }
            return 'invalid file';
        }
        return 'request has no file';
    }

    public function isImage($file)
    {
        $imageExtensions = ['jpeg','jpg','png'];
        $ext = strtolower($file->getClientOriginalExtension());
        if ( in_array($ext, $imageExtensions) )
        {
            return true;
        }
        return false;
    }

    public function getMediaOrder($type, $id)
    {
        if (Media::where('mediable_type', $type)->where('mediable_id', $id)->exists())
        {
            return Media::where('mediable_type', $type)->where('mediable_id', $id)->orderBy('id', 'DESC')->first()->media_order+1;
        }
        return 1;
    }

    public function deleteMediaFromId($id)
    {
    	$media = Media::find($id);
        $folders = ['/display/','/thumb/','/full/', '/original/', '/facebook/'];

        if ($media->mime == 'image')
        {
            foreach($folders as $folder)
            {
                if( file_exists ( storage_path('app/public/'.$media->directory.$folder.$media->filename) ) )
                {
                    unlink( storage_path('app/public/'.$media->directory.$folder.$media->filename) );
                }
            }
        }
        else
        {
            if( file_exists ( storage_path('app/public/'.$media->directory.'/docs/'.$media->filename) ) )
            {
                unlink( storage_path('app/public/'.$media->directory.'/docs/'.$media->filename) );
            }
        }

        $media->delete();

        return 'done';
    }

    public function updateDescription($request)
    {
        Media::find($request['id'])->update(['description' => $request['description']]);
        return 'done';
    }

    public function makeNiceName($request, $ext)
    {

        $element = Primitive::findModelFromRequest($request->mediable_type, $request->mediable_id);

        if( is_null($element) )
        {
            return \Str::random(4).'.'.$ext;
        }

        return $element->slug . '-' . $this->getMediaOrder($request->mediable_type, $request->mediable_id) . '-' .\Str::random(2).'.'.$ext;
    }

    public function makeNiceDescription($request)
    {
        $element = Primitive::findModelFromRequest($request->mediable_type, $request->mediable_id);

        if( is_null($element) )
        {
            return \Str::random(4);
        }

        return $element->name . ' ' . $this->getMediaOrder($request->mediable_type, $request->mediable_id);
    }

}
