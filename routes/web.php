<?php

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


// Authentication routes
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Voyager::routes();

    Route::get('/messages', 'Admin\MessageController@index');
    Route::get('/getMessages/{id}', 'Admin\MessageController@getUserMessage');
    Route::post('/sendMessage', 'Admin\MessageController@send');
    Route::get('/getNewMessages', 'Admin\MessageController@getNew');
});

// Include Wave Routes
Wave::routes();

Route::get('/pay-subscr',  function() {
    return view('pay');
});
Route::get('/about-us',   'FrontController@aboutUs')->name('about');
Route::get('/support',   'FrontController@support')->name('support');
Route::get('/news',   'FrontController@news')->name('news');
Route::get('/events',   'FrontController@events')->name('events');
Route::get('/franchize',   'FrontController@franchize')->name('franchize');
Route::get('/events/{slug}', 'EventsController@event')->name('event.event-single');
Route::get('/tour/{slug}', 'TourController@tour')->name('tour.event-tour');
Route::get('/region/{slug}', 'RegionController@region')->name('region.event-region');
Route::get('/region-{regID}/guides', 'GuideController@index')->name('region.guides');
Route::get('/guide-{id}', 'GuideController@single')->name('region.guide-single');
Route::get('/places/region-{regID}/category-{id}', 'PlaceController@index')->name('places.index');
Route::get('/place/{slug}', 'PlaceController@single')->name('places.single');

Route::get('region/{category}', 'RegionController@category')->name('region.category');
// Route::get('/events/{id}',   'FrontController@events')->name('events');
Route::get('/hot-tour',   'FrontController@hotTour')->name('hot-tour');
Route::get('/rules-for-clients',   'FrontController@guestInfo')->name('guest-info');
Route::get('/terms-of-use',   'FrontController@useTerms')->name('use-terms');
Route::get('/privacy-policy',   'FrontController@privacyPolicy')->name('privacy-policy');
Route::get('/contact',   'FrontController@contact')->name('contact');

Route::get('/favorites',   'FrontController@favorites')->name('favorites');


Route::post('/add/guide/tocart',   'FrontController@addToCart')->name('addtocart');
Route::post('/clear/remove/guide',   'FrontController@removeCart')->name('removeCart');

Route::group(['prefix' => 'message'], function (){
    Route::post('/send', 'MessageController@send');
    Route::post('/makeAllSeen', 'MessageController@makeAllSeen');
    Route::get('/getNew', 'MessageController@getNew');
    Route::get('/getAll', 'MessageController@getAll');

});

Route::post('/monthlySubscribe', function (\Illuminate\Http\Request $request){

    $mail = \Mail::to($request->email)->send(new \App\Mail\MonthlyUpdates());
    $fails = \Mail::failures();

});

Route::POST('/contactForm', function (\Illuminate\Http\Request $request){

    $mail = \Mail::to('jet71one@gmail.com')->send(new \App\Mail\Contact($request));
    $fails = \Mail::failures();
});

Route::post('search', 'SearchController@autocomplete');