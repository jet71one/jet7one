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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
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
Route::get('/events/{slug}', 'EventsController@event')->name('event.event-single');
// Route::get('/events/{id}',   'FrontController@events')->name('events');
Route::get('/hot-tour',   'FrontController@hotTour')->name('hot-tour');
Route::get('/contact',   'FrontController@contact')->name('contact');