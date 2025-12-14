<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book, Publication, Review, Reading, Apperance, Excerpt, Translation, Form};
use Illuminate\Support\Facades\Cache;
use \Carbon\Carbon;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $books = Cache::remember('books', 60*24*7, function () {
            return Book::whereIn('id',[1,2,3])->orderBy('id', 'DESC')->get();
        });

        // $publications = Cache::remember('publications', 60*24*3, function () {
        //     return Publication::->whereDate('published_at', '>=',Carbon::today()->subYear())->whereDate('published_at', '<=', Carbon::today())->orderBy('published_at', 'DESC')->get();
        // });


        $collection = collect()
                        ->merge(Book::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Translation::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Publication::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Review::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Apperance::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Reading::whereDate('published_at', '>=', Carbon::today()->subYear())->get())
                        ->merge(Form::whereDate('published_at', '>=', Carbon::today()->subYear())->get());
        $collection = $collection->sortByDesc('published_at');

// return $collection;
        return view('welcome', compact('books', 'collection'));
    }

    public function search()
    {
        if(! request()->has('q'))
        {
            return back()->with('message', 'You have to type something ...');
        }

        $books = Book::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $publications = Publication::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $excerpts = Excerpt::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $reviews = Review::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $apperances = Apperance::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $readings = Reading::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $translations = Translation::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();
        $mediaTrilogy = Form::where('name', 'like', '%'.request('q').'%')->orWhere('h2', 'like', '%'.request('q').'%')->orWhere('description', 'like', '%'.request('q').'%')->get();

        $results = collect();
        $results = $results->merge($readings)->merge($apperances)->merge($publications)->merge($reviews)->merge($books)->merge($excerpts)->merge($translations)->merge($mediaTrilogy);//
        return view('pages.results', compact('results'));

    }

    // public function contacts()
    // {
    //     return view('pages.contacts');
    // }

    public function contactsPost()
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'email|required',
            'description' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        if(is_null(request('email_to')))
        {
            $email_to = 'lyacos@yahoo.co.uk';
        }
        else
        {
            $email_to = str_replace("(at)", "@", request('email_to'));
        }

        $email_to = 'giacomo.gasperini@gmail.com';


		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, "secret=".config('g_secret')."&response=".request('g-recaptcha-response')."&remoteip=".$_SERVER['REMOTE_ADDR']);
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		curl_close ($verify);

		$decoded_captcha = json_decode($response, true);

		if($decoded_captcha['success'] === FALSE){
			return back()->with('message', 'Invalid Captcha');
		}

        try {
            \Mail::to($email_to)->send( new \App\Mail\Contact( request('name'), request('email'), request('description') ) );
            \Log::info('EMAIL SENT TO ' . $email_to);
        } catch (\Exception $e) {
            \Log::error('EMAIL NOT SENT ' . $e->getMessage());
        }
        return back()->with('message', 'Contact request has been sent!');
    }

    public function about()
    {
       $photos = collect(['dimitris-lyacos-greek-post-modern.jpg','dimitris-lyacos-poem.jpg','lyacos-dimitris-greek-literature.jpg','post-modern-poetry.jpg','dimitris-lyacos-bw.jpg','dimitris-lyacos-poet.jpg']);
        return view('pages.about', compact('photos'));
    }
}
