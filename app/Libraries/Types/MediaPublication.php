<?php 

namespace App\Libraries\Types;

class MediaPublication {

	public function resizeAndSaveImage($file, $filename, $directory)
	{
        $img = \Image::make( $file->getRealPath() );
        $img->backup();

        $img->fit(764, 965);
        $img->save( storage_path('app/public/'.$directory.'/full/').$filename );   

        $img->reset();

        $img->fit(450, 568);
        $img->save( storage_path('app/public/'.$directory.'/display/').$filename );

        $img->reset();

        $img->fit(90, 90);
        $img->save( storage_path('app/public/'.$directory.'/thumb/').$filename );

        return true;
	}

}