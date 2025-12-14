<?php

namespace App\Http\Controllers;

use App\Models\Apperance;

class ApperanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'media']]);
    }

    public function index()
    {
    	$elements = Apperance::orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        $slug = null;
    	return view('pages.appearances.index', compact('elements', 'slug'));
    }

    public function create()
    {
    	return view('pages.appearances.create');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
			'link_url' => 'nullable|url',
			'type' => 'required'
    	]);

    	$element = new Apperance;
    		$element->name = request('name');
    		$element->h2 = request('h2');
    		$element->location = request('location');
    		$element->published_at = request('published_at');
    		$element->description = request('description');
    		$element->link_url = request('link_url');
    		$element->link_text = request('link_text');
    		$element->type = request('type');
    	$element->save();

    	return redirect('admin/media-appearances')->with('message', 'Apperance Created!');
    }

    public function show($slug)
    {
        if( ! Apperance::where('slug', $slug)->exists())
        {
            $elements = Apperance::where('type', $slug)->orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->get();
            return view('pages.appearances.index', compact('elements', 'slug'));
        }
    	$element = Apperance::findBySlug($slug);
    	return view('pages.appearances.show', compact('element'));
    }

    public function edit($slug)
    {
    	$element = Apperance::findBySlug($slug);
    	return view('pages.appearances.edit', compact('element'));
    }


    public function update($slug)
    {
    	$element = Apperance::findBySlug($slug);
    	$this->validate(request(),[
    		'name' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'link_url' => 'nullable|url',
    		'type' => 'required'
    	]);

    		$element->name = request('name');
    		$element->h2 = request('h2');
    		$element->location = request('location');
    		$element->published_at = request('published_at');
    		$element->description = request('description');
    		$element->link_url = request('link_url');
    		$element->link_text = request('link_text');
    		$element->type = request('type');

        $element->save();

    	return redirect('admin/media-appearances')->with('message', 'Apperance Modified!');
    }

    public function destroy($slug)
    {
    	$element = Apperance::findBySlug($slug);
    	$helper = new MediaHelper;
    	foreach($element->media as $file)
    	{
    		$helper->deleteMediaFromId($file->id);
    	}
    	$element->delete();
    	return redirect('admin/media-appearances')->with('message', 'Apperance Deleted!');
    }

    public function media($slug)
    {
    	$element = Apperance::findBySlug($slug);
    	return view('pages.appearances.media', compact('element'));
    }


}
