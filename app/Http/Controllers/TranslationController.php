<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Translation, Book, Format, Language};

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$elements = Translation::all();
    	return view('pages.translations.index', compact('elements'));
    }

    public function create()
    {
        $formats = Format::pluck('name', 'id');
        $selectedFormat = [];
        $books = Book::pluck('name', 'id');
        $selectedBook = [];
        $languages = Language::pluck('name', 'id');
        $selectedLanguage = [];
    	return view('pages.translations.create', compact('formats', 'selectedFormat', 'books', 'selectedBook', 'languages', 'selectedLanguage'));
    }

    public function store()
    {

    	$this->validate(request(),[
    		'name' => 'required',
            'formats' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'buy_link_alternative' => 'nullable|url',
    		'buy_link' => 'nullable|url'
    	]);

    	$element = Translation::create( request()->except(['formats']) );
        $element->formats()->attach(request('formats'));

    	return redirect('admin/translations')->with('message', 'Translation Created!');
    }

    public function show($slug)
    {
    	$element = Translation::findBySlug($slug);
    	return view('pages.translations.show', compact('element'));
    }


    public function edit($slug)
    {
    	$element = Translation::findBySlug($slug);
        $formats = Format::pluck('name', 'id');
        $selectedFormat = [];
        foreach ($element->formats as $value) {
            $selectedFormat[] = $value->id;
        }
        $books = Book::pluck('name', 'id');
        $selectedBook = [$element->book_id];
        $languages = Language::pluck('name', 'id');
        $selectedLanguage = [$element->language_id];

    	return view('pages.translations.edit', compact('element', 'formats', 'selectedFormat', 'books', 'selectedBook', 'languages', 'selectedLanguage'));
    }

    public function update($slug)
    {


    	$element = Translation::findBySlug($slug);

    	$this->validate(request(),[
    		'name' => 'required',
            'formats' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'buy_link_alternative' => 'nullable|url',
    		'buy_link' => 'nullable|url'
    	]);

            $element->name = request('name');
            $element->published_at = request('published_at');
            $element->description = request('description');
            $element->buy_link = request('buy_link');
            $element->buy_text = request('buy_text');
            $element->buy_link_alternative = request('buy_link_alternative');
            $element->buy_text_alternative = request('buy_text_alternative');
            $element->h2 = request('h2');
            // $element->h2 = request('h2');
            $element->book_edition = request('book_edition');
            $element->isbn = request('isbn');
            $element->publisher = request('publisher');
            $element->number_of_pages = request('number_of_pages');
            $element->price = request('price');
            $element->currency = request('currency');

    	$element->save();

        $element->formats()->sync(request('formats'));

    	return redirect('admin/translations')->with('message', 'Translation Modified!');
    }

    public function destroy($slug)
    {
    	$element = Translation::findBySlug($slug);
    	$helper = new MediaHelper;
    	foreach($element->media as $file)
    	{
    		$helper->deleteMediaFromId($file->id);
    	}
    	$element->delete();
    	return redirect('admin/translations')->with('message', 'Translation Deleted!');
    }

    public function media($slug)
    {
    	$element = Translation::findBySlug($slug);
    	return view('pages.translations.media', compact('element'));
    }

}
