<?php

namespace App\Http\Controllers;

use App\Models\{Form, Book};
use App\Libraries\MediaHelper;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'media']]);
    }

    public function index()
    {
    	$elements = Form::latest()->get();
    	return view('pages.trilogy-in-other-media.index', compact('elements'));
    }

    public function create()
    {
        $books = Book::pluck('name', 'id');
        $selectedBook = [];
        return view('pages.trilogy-in-other-media.create', compact('books', 'selectedBook'));
    }

    public function store()
    {
        $this->validate(request(),[
            'name' => 'required',
            'published_at' => 'required',
            'description' => 'required',
            'link_url' => 'nullable|url',
        ]);

        $element = new Form;
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->description = request('description');
            $element->published_at = request('published_at');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->location = request('location');
        $element->save();
        $element->books()->attach(request('book_id'));

        return redirect('admin/trilogy-media')->with('message', 'Created!');
    }

    public function show($slug)
    {
        $element = Form::findBySlug($slug);
        return view('pages.trilogy-in-other-media.show', compact('element'));
    }

    public function edit($slug)
    {
        $element = Form::findBySlug($slug);
        $books = Book::pluck('name', 'id');
        $selectedBook = [];
        foreach ($element->books as $book) {
            $selectedBook[$book->id] = $book->id;
        }
        return view('pages.trilogy-in-other-media.edit', compact('element','books', 'selectedBook'));
    }

    public function update($slug)
    {
        $this->validate(request(),[
            'name' => 'required',
            'published_at' => 'required',
            'description' => 'required',
            'link_url' => 'nullable|url',
        ]);

        $element = Form::findBySlug($slug);
            $element->name = request('name');
            $element->h2 = request('h2');
            $element->description = request('description');
            $element->published_at = request('published_at');
            $element->link_url = request('link_url');
            $element->link_text = request('link_text');
            $element->location = request('location');
        $element->save();
        $element->books()->sync(request('book_id'));

        return redirect('admin/trilogy-media')->with('message', 'Updated!');
    }

    public function destroy($slug)
    {
        $element = Form::findBySlug($slug);
        if($element->books()->exists())
        {
            $element->books()->detach();
        }
        if($element->media()->exists())
        {
            $helper = new MediaHelper;
            foreach($element->media as $file)
            {
                $helper->deleteMediaFromId($file->id);
            }
        }

        $element->delete();
        return redirect('admin/trilogy-media')->with('message', 'Deleted!');
    }

    public function media($slug)
    {
        $element = Form::findBySlug($slug);
        return view('pages.trilogy-in-other-media.media', compact('element'));
    }

    public function video()
    {
        $element = Form::findBySlug("a-video-by-gudrun-bielz-based-on-nyctivoe");
        return view('pages.trilogy-in-other-media.video', compact('element'));
    }

}
