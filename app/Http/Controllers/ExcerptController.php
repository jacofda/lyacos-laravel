<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Excerpt, Book, Format, Language};
use App\Libraries\MediaHelper;


class ExcerptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'store', 'update', 'media']]);
    }


    public function index()
    {
    	$elements = Excerpt::all();
    	return view('pages.excerpts.index', compact('elements'));
    }

    public function create()
    {
        $books = Book::pluck('name', 'id');
        $selectedBook = [];
        $languages = Language::pluck('name', 'id');
        $selectedLanguage = [];
    	return view('pages.excerpts.create', compact('books', 'selectedBook', 'languages', 'selectedLanguage'));
    }

    public function store()
    {

    	$this->validate(request(),[
    		'name' => 'required',
            'language_id' => 'required',
            'link_url' => 'nullable|url'
    	]);

    	$element = new Excerpt;
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->language_id = request('language_id');
            $element->description = request('description');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->book_id = request('book_id');
        $element->save();

    	return redirect('admin/excerpts')->with('message', 'Excerpt Created!');
    }

    public function show($slug)
    {
    	$element = Excerpt::findBySlug($slug);
    	return view('pages.excerpts.show', compact('element'));
    }


    public function edit($slug)
    {
    	$element = Excerpt::findBySlug($slug);
        $books = Book::pluck('name', 'id');
        $selectedBook = [$element->book_id];
        $languages = Language::pluck('name', 'id');
        $selectedLanguage = [$element->language_id];

    	return view('pages.excerpts.edit', compact('element', 'books', 'selectedBook', 'languages', 'selectedLanguage'));
    }

    public function update($slug)
    {
    	$element = Excerpt::findBySlug($slug);

    	$this->validate(request(),[
            'name' => 'required',
            'language_id' => 'required',
            'link_url' => 'nullable|url'
    	]);

            $element->name = request('name');
            $element->h2 = request('h2');
            $element->language_id = request('language_id');
            $element->description = request('description');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->book_id = request('book_id');
        $element->save();

    	return redirect('admin/excerpts')->with('message', 'Excerpt Modified!');
    }

    public function destroy($slug)
    {
    	$element = Excerpt::findBySlug($slug);
    	$helper = new MediaHelper;
    	foreach($element->media as $file)
    	{
    		$helper->deleteMediaFromId($file->id);
    	}
    	$element->delete();
    	return redirect('admin/excerpts')->with('message', 'Excerpt Deleted!');
    }

    public function media($slug)
    {
    	$element = Excerpt::findBySlug($slug);
    	return view('pages.excerpts.media', compact('element'));
    }


    public function language($language)
    {
        $lang = Language::findBySlug($language);
        $elements = Excerpt::where('language_id', $lang->id)->orderBy('id', 'desc')->get();
        return view('pages.excerpts.language', compact('elements', 'lang'));
    }

}
