<?php

namespace App\Http\Controllers;

use App\Models\{Publication, Language, Book};
use App\Libraries\MediaHelper;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'media']]);
    }

    public function index()
    {
    	$elements = Publication::where('name', 'not like', '%interview%')->orderBy('publication_order', 'DESC')->get();
        $slug = null;
    	return view('pages.publications.index', compact('elements', 'slug'));
    }

    public function interviews()
    {
        $elements = Publication::where('name', 'like', '%interview%')->orderBy('publication_order', 'ASC')->get();
        return view('pages.publications.interviews', compact('elements'));
    }


    public function create()
    {
        $books = Book::pluck('name', 'id');
        $types = ['printed' => 'printed', 'online' => 'online'];
        $selectedBook = [];
        $selectedType = [];
    	return view('pages.publications.create', compact('books', 'selectedBook', 'types', 'selectedType'));
    }

    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'language_id' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'link_url' => 'nullable|url',
    	]);

    	$element = new Publication;
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->description = request('description');
            $element->published_at = request('published_at');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->language_id = request('language_id');
            $element->type = request('type');
            $element->location = request('location');
            $element->publication_order = Publication::orderBy('publication_order', 'DESC')->first()->id+1;
        $element->save();
        $element->books()->attach(request('book_id'));

    	return redirect('admin/publications')->with('message', 'Publication Created!');
    }


    public function show($slug, $publication = null)
    {
        if( is_null($publication) )
        {
            if ( Publication::where('type', $slug)->exists() )
            {
                $elements = Publication::where('type', $slug)->get();
                return view('pages.publications.index', compact('elements', 'slug'));
            }
            elseif( Language::where('name', $slug)->exists() )
            {
                $lang = Language::where('name', $slug)->first();
                $elements = Publication::where('language_id', $lang->id)->get();
                return view('pages.publications.index', compact('elements', 'slug'));
            }
            elseif($slug == 'latest')
            {
                $elements = Publication::orderBy('published_at', 'DESC')->get();
                return view('pages.publications.index', compact('elements', 'slug'));
            }
            elseif($slug == 'oldest')
            {
                $elements = Publication::orderBy('published_at', 'ASC')->get();
                return view('pages.publications.index', compact('elements', 'slug'));
            }
            elseif ($slug == 'create') {
                $books = Book::pluck('name', 'id');
                $types = ['printed' => 'printed', 'online' => 'online'];
                $selectedBook = [];
                $selectedType = [];
                $languages = Language::pluck('name','id');
                return view('pages.publications.create', compact('books', 'selectedBook', 'types', 'selectedType', 'languages'));
            }
        }
        elseif($publication == 'edit')
        {
            if(\Auth::guest())
            {
                return back()->with('message', 'Restriced Page!');
            }
            $element = Publication::findBySlug($slug);
            $books = Book::pluck('name', 'id');
            $selectedBook = [];
            foreach ($element->books as $book) {
                $selectedBook[$book->id] = $book->id;
            }
            $types = ['printed' => 'printed', 'online' => 'online'];
            $selectedType[$element->type] = $element->type;

            $languages = Language::pluck('name','id');

            return view('pages.publications.edit', compact('element', 'books', 'selectedBook', 'types', 'selectedType', 'languages'));
        }
        elseif($publication == 'media'){
            $element = Publication::findBySlug($slug);
        	return view('pages.publications.media', compact('element'));
        }

        $element = Publication::findBySlug($publication);
        return view('pages.publications.show', compact('element'));

    }

    public function update($slug)
    {
    	$element = Publication::findBySlug($slug);
    	$this->validate(request(),[
    		'name' => 'required',
    		'language_id' => 'required',
            'type' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'link_url' => 'nullable|url'
    	]);
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->description = request('description');
            $element->published_at = request('published_at');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->language_id = request('language_id');
            $element->type = request('type');
            $element->location = request('location');
        $element->save();

        $element->books()->sync(request('book_id'));

    	return redirect('publications/'.$element->type.'/'.$element->slug)->with('message', 'Publication Modified!');
    }

    public function destroy($slug)
    {
    	$element = Publication::findBySlug($slug);
    	$helper = new MediaHelper;
    	foreach($element->media as $file)
    	{
    		$helper->deleteMediaFromId($file->id);
    	}
    	$element->delete();
    	return redirect('admin/publications')->with('message', 'Publication Deleted!');
    }

    public function media($publication)
    {
        dd($publication);
    	$element = Publication::findBySlug($slug);
    	return view('pages.publications.media', compact('element'));
    }
}










/*
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->description = request('description');
            $element->published_at = Carbon::createFromFormat( 'd/m/Y H:i', '01/'.request('published_at').' 00:00' );
            $element->buy_link = request('buy_link');
            $element->buy_text = request('buy_text');
            $element->buy_link_alternative = request('buy_link_alternative');
            $element->buy_text_alternative = request('buy_text_alternative');
            $element->language = request('language');
            $element->translated_by = request('translated_by');
            $element->book_edition = request('book_edition');
            $element->book_format = request('book_format');
            $element->isbn = request('isbn');
            $element->publisher = request('publisher');
            $element->number_of_pages = request('number_of_pages');
            $element->price = request('price');
            $element->currency = request('currency');
 */
