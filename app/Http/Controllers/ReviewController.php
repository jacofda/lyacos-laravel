<?php

namespace App\Http\Controllers;

use App\Models\{Review, Language, Book};
use App\Libraries\MediaHelper;

class ReviewController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'media']]);
    }

	public function create()
	{
		$books = Book::pluck('name', 'id');
		$selectedBook = [];
        $languages = Language::pluck('name', 'id');
        $selectedLanguage = [];
		return view('pages.reviews.create', compact('books', 'selectedBook','languages', 'selectedLanguage'));
	}

    public function edit($slug)
    {
    	$element = Review::findBySlug($slug);
    	$books = Book::pluck('name', 'id'); $selectedBook = [];
    	foreach ($element->books as $book) {
    		$selectedBook[$book->id] = $book->id;
    	}

    	$languages = Language::pluck('name', 'id');
        $selectedLanguage = [$element->language_id];


    	return view('pages.reviews.edit', compact('element', 'books', 'selectedBook', 'languages', 'selectedLanguage'));
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'h2' => 'required',
    		'published_at' => 'required',
    		'link_url' => 'nullable|url',
    		'language_id' => 'required'
    	]);
    	$element = new Review;
    		$element->name = request('name');
    		$element->h2 = request('h2');
            $element->location = request('location');
            $element->reviewer = request('reviewer');
    		$element->description = request('description');
    		$element->published_at = request('published_at');
    		$element->link_url = request('link_url');
    		$element->link_text = request('link_text');
    		$element->language_id = request('language_id');
            $element->review_order = Review::orderBy('review_order', 'DESC')->first()->id+1;
    	$element->save();
    	$element->books()->attach(request('book_id'));

    	return redirect('admin/reviews');
    }

    public function update($slug)
    {
    	$element = Review::findBySlug($slug);
    	$this->validate(request(), [
    		'name' => 'required',
    		'h2' => 'required',
    		'published_at' => 'required',
    		'link_url' => 'nullable|url',
    		'language_id' => 'required'
    	]);
    		$element->name = request('name');
    		$element->h2 = request('h2');
            $element->location = request('location');
            $element->reviewer = request('reviewer');
    		$element->description = request('description');
    		$element->published_at = request('published_at');
    		$element->link_url = request('link_url');
    		$element->link_text = request('link_text');
    		$element->language_id = request('language_id');
    	$element->save();
    	$element->books()->sync(request('book_id'));

    	return redirect('admin/reviews');
    }

    public function index()
    {
    	$elements = Review::orderBy('review_order', 'DESC')->get();
    	$slug = null;
		  return view('pages.reviews.index', compact('elements', 'slug'));
    }

    public function show($slug)
    {
    	if(Review::where('slug',$slug)->exists())
    	{
	    	$element = Review::findBySlug($slug);
	  		return view('pages.reviews.show', compact('element'));
  		}

  		if($slug == 'oldest')
  		{
  			$elements = Review::orderBy('published_at', 'ASC')->orderBy('created_at', 'ASC')->get();
  			return view('pages.reviews.index', compact('elements', 'slug'));
  		}
  		elseif($slug == 'latest')
  		{
        $elements = Review::orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->get();
  			return view('pages.reviews.index', compact('elements', 'slug'));
  		}
      elseif(Book::where('slug',$slug)->exists())
      {
        $elements = Book::findBySlug($slug)->reviews()->orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('pages.reviews.index', compact('elements', 'slug'));
      }


  		return back()->with('message', 'page not found');
    }

    public function destroy($slug)
    {
        $element = Review::findBySlug($slug);
        if($element->media()->exists())
        {
            $helper = new MediaHelper;
            foreach($element->media as $file)
            {
                $helper->deleteMediaFromId($file->id);
            }
        }
        $element->delete();
        return redirect('admin/reviews')->with('message', 'Review Deleted!');
    }

}
