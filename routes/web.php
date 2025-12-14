<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GoogleV3CaptchaController;

Route::get('contact', [GoogleV3CaptchaController::class, 'index']);
Route::post('lyacosnet', [GoogleV3CaptchaController::class, 'validateGCaptch']);
Route::get('contacts', [GoogleV3CaptchaController::class, 'all']);
Route::delete('contacts/{id}', [GoogleV3CaptchaController::class, 'destroy']);



use App\Http\Controllers\{AdminController, ApperanceController, BookController, ExcerptController, FormController, PageController, PublicationController, ReadingController, ReviewController, TranslationController};
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [PageController::class, 'welcome']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('contact', [PageController::class, 'contacts']);
// Route::post('contacts', [PageController::class, 'contactsPost']);
Route::get('about-and-press', [PageController::class, 'about']);
Route::get('results', [PageController::class, 'search']);

Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('books/create', [BookController::class, 'create']);
Route::get('books', [BookController::class, 'index']);
Route::get('books/in-translation', [BookController::class, 'inTranslation']);
Route::get('books/first-or-out-of-print-editions', [BookController::class, 'oldEditions']);


Route::get('books/excerpts', [BookController::class, 'bookExcerpts']);//index excerpts
Route::get('books/excerpts/{excerpt}', [BookController::class, 'bookExcerpt']);//show excerpt

Route::get('books/{language}', [BookController::class, 'language']);
Route::get('books/english/{book}', [BookController::class, 'show']);
Route::get('books/{language}/{book}', [BookController::class, 'bookTranslation']);


Route::get('books/{book}/edit', [BookController::class, 'edit']);
Route::get('books/{book}/media', [BookController::class, 'media']);
Route::post('books', [BookController::class, 'store']);
Route::patch('books/{book}', [BookController::class, 'update']);
Route::delete('books/{book}', [BookController::class, 'destroy']);

Route::get('translations/create', [TranslationController::class, 'create']);
Route::get('translations/{translation}/edit', [TranslationController::class, 'edit']);
Route::get('translations/{translation}/media', [TranslationController::class, 'media']);
Route::post('translations', [TranslationController::class, 'store']);
Route::patch('translations/{translation}', [TranslationController::class, 'update']);
Route::delete('translations/{translation}', [TranslationController::class, 'destroy']);

Route::get('publications/{type}', [PublicationController::class, 'show']);
Route::get('publications/{type}/{publication}', [PublicationController::class, 'show']);
Route::get('publications/create', [PublicationController::class, 'create']);
Route::get('publications/{publication}/edit', [PublicationController::class, 'edit']);
Route::get('publications/{publication}/media', [PublicationController::class, 'media']);
Route::get('publications', [PublicationController::class, 'index']);
Route::get('interviews', [PublicationController::class, 'interviews']);
Route::post('publications', [PublicationController::class, 'store']);
Route::patch('publications/{publication}', [PublicationController::class, 'update']);
Route::delete('publications/{publication}', [PublicationController::class, 'destroy']);

Route::get('excerpts/create', [ExcerptController::class, 'create']);
Route::get('excerpts/{language}', [ExcerptController::class, 'language']);
Route::get('excerpts/{excerpt}/edit', [ExcerptController::class, 'edit']);
Route::get('excerpts/{excerpt}/media', [ExcerptController::class, 'media']);
Route::get('excerpts', [ExcerptController::class, 'index']);
Route::post('excerpts', [ExcerptController::class, 'store']);
Route::patch('excerpts/{excerpt}', [ExcerptController::class, 'update']);
Route::delete('excerpts/{excerpt}', [ExcerptController::class, 'destroy']);

Route::get('reviews/create', [ReviewController::class, 'create']);
Route::get('reviews/{review}', [ReviewController::class, 'show']);
Route::get('reviews/{review}/edit', [ReviewController::class, 'edit']);
Route::get('reviews/{review}/media', [ReviewController::class, 'media']);
Route::get('reviews', [ReviewController::class, 'index']);
Route::post('reviews', [ReviewController::class, 'store']);
Route::patch('reviews/{review}', [ReviewController::class, 'update']);
Route::delete('reviews/{review}', [ReviewController::class, 'destroy']);

Route::get('readings/{year}/{slug}', [ReadingController::class, 'alternativeShow']);
Route::get('readings/create', [ReadingController::class, 'create']);
Route::get('readings/{reading}', [ReadingController::class, 'show']);
Route::get('readings/{reading}/edit', [ReadingController::class, 'edit']);
Route::get('readings', [ReadingController::class, 'index']);
Route::post('readings', [ReadingController::class, 'store']);
Route::patch('readings/{reading}', [ReadingController::class, 'update']);
Route::delete('readings/{reading}', [ReadingController::class, 'destroy']);
Route::get('readings/{slug}/media', [ReadingController::class, 'media']);


Route::get('media-appearances/create', [ApperanceController::class, 'create']);
Route::get('media-appearances/{apperance}', [ApperanceController::class, 'show']);
Route::get('media-appearances/{apperance}/edit', [ApperanceController::class, 'edit']);
Route::get('media-appearances', [ApperanceController::class, 'index']);
Route::post('media-appearances', [ApperanceController::class, 'store']);
Route::patch('media-appearances/{apperance}', [ApperanceController::class, 'update']);
Route::delete('media-appearances/{apperance}', [ApperanceController::class, 'destroy']);
Route::get('media-appearances/{apperance}/media', [ApperanceController::class, 'media']);

// Route::get('the-trilogy-in-other-media/a-video-by-gudrun-bielz-based-on-nyctivoe', 'FormController@video');
Route::resource('the-trilogy-in-other-media', FormController::class);
Route::get('the-trilogy-in-other-media/{form}/media', [FormController::class, 'media']);

Route::group(['prefix' => 'admin'], function(){

	Route::get('media-appearances', [AdminController::class, 'appearances']);
	Route::get('books', [AdminController::class, 'books']);
	Route::get('translations', [AdminController::class, 'translations']);
	Route::get('publications', [AdminController::class, 'publications']);
	Route::get('excerpts', [AdminController::class, 'excerpts']);
	Route::get('readings', [AdminController::class, 'readings']);
	Route::get('reviews', [AdminController::class, 'reviews']);
	Route::get('trilogy-media', [AdminController::class, 'trilogyMedia']);

	Route::post('media/upload', [AdminController::class, 'addMedia']);
	Route::post('media/update', [AdminController::class, 'updateMedia']);
	Route::post('media/order', [AdminController::class, 'sortMedia']);
	Route::post('media/type', [AdminController::class, 'typeMedia']);
	Route::delete('media/delete',[AdminController::class, 'deleteMedia']);

	Route::post('clear-view-cache', [AdminController::class, 'clearViewCache']);
	Route::post('clear-data-cache', [AdminController::class, 'clearDataCache']);
	Route::post('clear-config-cache', [AdminController::class, 'clearConfigCache']);

	Route::post('sorting/{model}', [AdminController::class, 'sorting']);

});
