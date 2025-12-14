<?php 

namespace App\Libraries\Types;

class MediaDefault {

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
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save( storage_path('app/public/'.$directory.'/full/').$filename );

            $img->reset();     

            $img->fit(600, 836);
            $img->save( storage_path('app/public/'.$directory.'/display/').$filename );
        }

        $img->reset();

        $img->fit(128, 96);
        $img->save( storage_path('app/public/'.$directory.'/thumb/').$filename );

        return true;
	}

}