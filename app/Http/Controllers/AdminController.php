<?php

namespace App\Http\Controllers;

use App\Models\{Book, Translation, Publication, Excerpt, Reading, Review, Apperance, Media, Form};
use App\Libraries\MediaHelper;
use \Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('pages.admin.dashboard');
    }

    public function books()
    {
        $elements = Book::all();
        return view('pages.admin.books', compact('elements'));
    }

    public function translations()
    {
        $elements = Translation::all();
        return view('pages.admin.translations', compact('elements'));
    }

    public function publications()
    {
        $elements = Publication::all();
        return view('pages.admin.publications', compact('elements'));
    }

    public function excerpts()
    {
        $elements = Excerpt::all();
        return view('pages.admin.excerpts', compact('elements'));
    }

    public function readings()
    {
        $elements = Reading::all();
        return view('pages.admin.readings', compact('elements'));
    }

    public function reviews()
    {
        $elements = Review::orderBy('review_order', 'DESC')->get();
        return view('pages.admin.reviews', compact('elements'));
    }

    public function appearances()
    {
        $elements = Apperance::latest()->get();
        return view('pages.admin.appearances', compact('elements'));
    }

    public function trilogyMedia()
    {
        $elements = Form::latest()->get();
        return view('pages.admin.trilogy-media', compact('elements'));
    }


    public function addMedia()
    {
        $helper = new MediaHelper;
        $helper->saveImageOrFile(request());
        return back();
    }

    public function updateMedia()
    {
        $file = Media::find(request('id'));
            $file->description = request('description');
        $file->save();
        return 'description updated';
    }

    public function deleteMedia()
    {
        $helper = new MediaHelper;
        $helper->deleteMediaFromId( request('id') );
        return back()->with('message', 'Media Deleted!');
    }

    public function sortMedia()
    {
        foreach ( request('media_order') as $key => $value) {
            Media::where('id', $value)->update(['media_order' => $key+1]);
        }
        return 'sorting updated';
    }
    public function typeMedia()
    {
        $file = Media::find(request('id'));
            $file->type = request('type');
        $file->save();
        return 'type changed';
    }

    //admin/sorting/{model}
    public function sorting($model)
    {

    	if($model == 'reviews')
    	{
    		$total = Review::count();

	        foreach ( request('model_order') as $key => $value) {
	            Review::where('id', $value)->update([str_singular($model).'_order' => $total-$key]);
	        }

    		return 'Order '.$model.' changed';
    	}
    	elseif($model == 'publications')
    	{
    		$total = Publication::count();

	        foreach ( request('model_order') as $key => $value) {
	            Publication::where('id', $value)->update([str_singular($model).'_order' => $total-$key]);
	        }

    		return 'Order '.$model.' changed';
    	}
    	return 'no chagings made';
    }

    public function clearViewCache()
    {
        Artisan::call('view:clear');
        return 'view cache cleared';
    }
    public function clearDataCache()
    {
        Artisan::call('cache:clear');
        return 'data cache cleared';
    }
    public function clearConfigCache()
    {
        Artisan::call('config:cache');
        return 'config cache cleared';
    }


}
