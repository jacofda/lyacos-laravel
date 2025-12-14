<?php 

namespace App\Libraries\Types;

class MediaTranslation {

	public function resizeAndSaveImage($file, $filename, $directory)
	{
        $img = \Image::make( $file->getRealPath() );
        $width = $img->width();
        $height = $img->height();
        $img->backup();

        if ($width > $height)
        {   
            if($width < 1920)
            {
                $img->save( storage_path('app/public/'.$directory.'/full/').$filename );
            }
            else
            {
                $img->fit(1920, 1280);
                $img->save( storage_path('app/public/'.$directory.'/full/').$filename );          
            }

            $img->reset();

            $img->fit(600, 400);
            $img->save( storage_path('app/public/'.$directory.'/display/').$filename );
        }
        else
        {   
            if($height > 810)
            {
                $img->resize(null, 810, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save( storage_path('app/public/'.$directory.'/full/').$filename );
            }
            else
            {
                $img->save( storage_path('app/public/'.$directory.'/full/').$filename );
            }
            $img->reset();

            if($width > 600)
            {
                $img->resize(810, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save( storage_path('app/public/'.$directory.'/display/').$filename );
            }
            else
            {
                $img->save( storage_path('app/public/'.$directory.'/display/').$filename );
            }
            
        }

        $img->reset();

        $img->fit(128, 128);
        $img->save( storage_path('app/public/'.$directory.'/thumb/').$filename );

        return true;
	}

}