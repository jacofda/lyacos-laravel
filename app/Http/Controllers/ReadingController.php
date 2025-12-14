<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Carbon\Carbon;

class ReadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'media']]);
    }

    public function index()
    {
    	$elements = Reading::latest()->get();
    	$slug = null;
    	return view('pages.readings.index', compact('elements', 'slug'));
    }

    public function create()
    {
    	return view('pages.readings.create');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'country' => 'required',
    		'published_at' => 'required'
    	]);

    	$element = new Reading;
    		$element->name = request('name');
    		$element->h2 = request('h2');
    		$element->description = request('description');
    		$element->location = request('location');
    		$element->country = request('country');
    		if(!is_null(request('published_at')))
    		{
    			$element->published_at = Carbon::createFromFormat( 'd/m/Y H:i', request('published_at').' 00:00');
    		}
    		if(!is_null(request('end_at')))
    		{
    			$element->end_at = Carbon::createFromFormat( 'd/m/Y H:i', request('end_at').' 00:00');
    		}
    		$element->start_at_hour = request('start_at_hour');
    		$element->end_at_hour = request('end_at_hour');
    	$element->save();

    	return redirect('admin/readings')->with('message', 'Reading Created!');
    }

	//readings/{year}/{slug}
	public function alternativeShow($year, $slug = null)
	{
		if($slug)
		{
			if($slug == 'edit')
			{
		    	$element = Reading::findBySlug($year);
		    	return view('pages.readings.edit', compact('element'));
			}
			$element = Reading::findBySlug($slug);
	    	return view('pages.readings.show', compact('element'));
	    }
		$elements = Reading::whereYear('published_at', $year)->get();
		dd($elements);
    	return view('pages.readings.index', compact('elements'));
	}

    public function show($slug)
    {
        if($slug == 'oldest')
  		{
  			$elements = Reading::orderBy('published_at', 'ASC')->orderBy('created_at', 'ASC')->get();
            // dd($elements);
  			return view('pages.readings.index', compact('elements', 'slug'));
  		}
  		elseif($slug == 'latest')
  		{
        $elements = Reading::orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->get();
  			return view('pages.readings.index', compact('elements', 'slug'));
  		}
    	$element = Reading::findBySlug($slug);
    	return view('pages.readings.show', compact('element'));
    }


    public function edit($slug)
    {
    	$element = Reading::findBySlug($slug);
    	return view('pages.readings.edit', compact('element'));
    }

    public function update($slug)
    {
    	$element = Reading::findBySlug($slug);

    	$this->validate(request(),[
    		'name' => 'required',
    		'published_at' => 'required',
    		'country' => 'required'
    	]);

    		$element->name = request('name');
    		$element->h2 = request('h2');
    		$element->description = request('description');
    		$element->location = request('location');
    		$element->country = request('country');
    		if(!is_null(request('published_at')))
    		{
    			$element->published_at = Carbon::createFromFormat( 'd/m/Y H:i', request('published_at').' 00:00');
    		}
    		if(!is_null(request('end_at')))
    		{
    			$element->end_at = Carbon::createFromFormat( 'd/m/Y H:i', request('end_at').' 00:00');
    		}
    		$element->start_at_hour = request('start_at_hour');
    		$element->end_at_hour = request('end_at_hour');
    	$element->save();

    	return redirect('admin/readings')->with('message', 'Reading Modified!');
    }

    public function destroy($slug)
    {
    	Reading::findBySlug($slug)->delete();
    	return redirect('admin/readings')->with('message', 'Reading Deleted!');
    }

}
