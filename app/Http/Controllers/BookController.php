<?php

namespace App\Http\Controllers;

use App\Models\{Book, Format, Translation, Excerpt, Language};
use App\Libraries\MediaHelper;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'store', 'update', 'media']]);
    }

    public function index()
    {
    	$books = Book::orderBy('book_order')->get();
        $translations = Translation::orderBy('language_id', 'ASC')->get();
        $elements = collect();
        $elements = $elements->merge($books)->merge($translations);
    	return view('pages.books.index', compact('elements'));
    }

    public function create()
    {
        $formats = Format::pluck('name', 'id');
        $selectedFormat = [];
    	return view('pages.books.create', compact('formats', 'selectedFormat'));
    }

    public function store()
    {

    	$this->validate(request(),[
    		'name' => 'required',
            'formats' => 'required',
            'translated_by' => 'required',
    		'published_at' => 'required',
    		'description' => 'required',
    		'buy_link_alternative' => 'nullable|url',
    		'buy_link' => 'nullable|url'
    	]);

    	$element = Book::create(request()->input());
        $element->formats()->attach(request('formats'));

    	return redirect('admin/books')->with('message', 'Book Created!');
    }
    //poena-damni/trilogy
    public function trilogy()
    {
        $elements = Book::take(3)->get();
        return view('pages.books.trilogy', compact('elements'));
    }

    //books/english/{book}
    public function show($slug)
    {
    	$element = Book::findBySlugOrFail($slug);
        $extract = Excerpt::where('book_id', $element->id)->where('language_id', 1)->first();
        $latestPublication = $element->publications()->where('language_id', 1)->orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->first();
        $latestReview = $element->reviews()->where('language_id', 1)->orderBy('published_at', 'DESC')->orderBy('created_at', 'DESC')->first();

// dd($extract, $latestPublication, $latestReview);
    	return view('pages.books.show', compact('element', 'extract', 'latestPublication', 'latestReview'));
    }

    //books/translation
    public function bookTranslations()
    {
        $elements = Translation::all();
        return view('pages.books.translations', compact('elements'));
    }

    //books/{language}/{book}
    public function bookTranslation($language, $translation)
    {

        if($translation == 'media')
        {
            if(\Auth::guest())
            {
                return back()->with('message', 'Area only for Authenticated user');
            }
            $element = Book::findBySlugOrFail($language);
            return view('pages.books.media', compact('element'));
        }
        elseif($translation == 'edit')
        {
            if(\Auth::guest())
            {
                return back()->with('message', 'Area only for Authenticated user');
            }
            $element = Book::findBySlugOrFail($language);
            $formats = Format::pluck('name', 'id');
            $selectedFormat = [];
            foreach ($element->formats as $value) {
                $selectedFormat[] = $value->id;
            }
            return view('pages.books.edit', compact('element', 'formats', 'selectedFormat'));
        }



        if(Language::where('slug', $language)->exists())
        {
            if(Translation::where('slug', $translation)->where('language_id', Language::where('slug', $language)->first()->id)->exists())
            {

                $element = Translation::where('slug', $translation)->where('language_id', Language::where('slug', $language)->first()->id)->first();
                $book = Book::find($element->book_id);

                // dd($book->display);

                $extract = Excerpt::where('book_id', $element->book_id)->first();
                if(Excerpt::where('book_id', $element->book_id)->where('language_id', $element->language_id)->exists())
                {
                    $extract = Excerpt::where('book_id', $element->book_id)->where('language_id', $element->language_id)->first();
                }

                $latestPublication = $book->publications()
                                        ->where('language_id', 1)
                                        ->orderBy('published_at', 'DESC')
                                        ->orderBy('created_at', 'DESC')
                                        ->first();
                if ($book->publications()->where('language_id', $element->language_id)->exists())
                {
                    $latestPublication = $book->publications()->where('language_id', $element->language_id)->latest()->first();
                }
                $latestReview = $book->reviews()
                                    ->where('language_id', 1)
                                    ->orderBy('published_at', 'DESC')
                                    ->orderBy('created_at', 'DESC')
                                    ->first();

                if ($book->reviews()->where('language_id', $element->language_id)->exists())
                {
                    $latestReview = $book->reviews()->where('language_id', $element->language_id)->latest()->first();
                }

                return view('pages.books.translation', compact('element', 'book', 'extract', 'latestPublication', 'latestReview', 'language'));

            }
        }




return abort(404);



    }

    public function bookExcerpts()
    {
        $books = Book::all();
        return view('pages.books.excerpts', compact('books'));
    }
    //books/excerpts/{excerpt}
    public function bookExcerpt($excerpt)
    {
        $element = Excerpt::findBySlugOrFail($excerpt);
        return view('pages.books.excerpt', compact('element'));
    }

    public function edit($slug)
    {
    	$element = Book::findBySlugOrFail($slug);
        $formats = Format::pluck('name', 'id');
        $selectedFormat = [];
        foreach ($element->formats as $value) {
            $selectedFormat[] = $value->id;
        }
    	return view('pages.books.edit', compact('element', 'formats', 'selectedFormat'));
    }

    public function update($slug)
    {
    	$element = Book::findBySlugOrFail($slug);

    	$this->validate(request(),[
    		'name' => 'required',
            'formats' => 'required',
            'translated_by' => 'required',
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
            $element->translated_by = request('translated_by');
            $element->book_edition = request('book_edition');
            $element->isbn = request('isbn');
            $element->publisher = request('publisher');
            $element->number_of_pages = request('number_of_pages');
            $element->price = request('price');
            $element->currency = request('currency');

        $element->save();


        $element->formats()->sync(request('formats'));

    	return redirect('admin/books')->with('message', 'Book Modified!');
    }

    public function destroy($slug)
    {
    	$element = Book::findBySlugOrFail($slug);
    	$helper = new MediaHelper;
    	foreach($element->media as $file)
    	{
    		$helper->deleteMediaFromId($file->id);
    	}
    	$element->delete();
    	return redirect('admin/books')->with('message', 'Book Deleted!');
    }

    public function media($slug)
    {
    	$element = Book::findBySlugOrFail($slug);
    	return view('pages.books.media', compact('element'));
    }

    public function language($language)
    {

        if($language == 'english')
        {
            $elements = Book::where('id', '!=', 4)->orderBy('book_order', 'ASC')->get();
            return view('pages.books.language', compact('elements', 'language'));
        }
        elseif(Language::where('slug', $language)->exists())
        {
            $elements = Translation::where('language_id', Language::findBySlugOrFail($language)->id)->orderBy('published_at', 'DESC')->get();
            return view('pages.books.language', compact('elements', 'language'));
        }
        elseif($language == 'excerpts')
        {
            $books = Book::all();
            return view('pages.books.excerpts', compact('books'));
        }
        elseif ($language == 'in-translation') {
            $elements = Excerpt::where('language_id', '!=', 1)->where('language_id', '!=', 2)->where('language_id', '!=', 3)->where('language_id', '!=', 4)->orderBy('language_id', 'ASC')->get();
            return view('pages.books.in-translation', compact('elements'));
        }

        return abort(404);

    }

    //books/in-translation
    public function inTranslation()
    {

        $elements = [];$count = 0;
        foreach(Excerpt::orderBy('language_id', 'ASC')->get() as $element)
        {
            $elements[$element->language_id][$count]['name'] = $element->name;
            $elements[$element->language_id][$count]['h2'] = $element->h2;
            $elements[$element->language_id][$count]['book_id'] = $element->book_id;
            $elements[$element->language_id][$count]['slug'] = $element->slug;
            $elements[$element->language_id][$count]['link_url'] = $element->link_url;
            $elements[$element->language_id][$count]['link_text'] = $element->link_text;
            $count++;
        }

        return view('pages.books.in-translation', compact('elements'));
    }

    //books/first-or-out-of-print-editions
    public function oldEditions()
    {
        return view('pages.books.old-editions');
    }

}
