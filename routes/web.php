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

Route::get('cmd', function() {
   
    //Artisan::call("storage:link");
    //Artisan::call("optimize:clear");
	 Artisan::call("cache:clear");
	 Artisan::call("view:clear");
});

Auth::routes();

Route::get('/discussion', 'DiscussionController@quest')->name('quest');
Route::get('/question-create', 'DiscussionController@questCreate')->name('quest.create');
Route::get('/question-store', 'DiscussionController@questStore')->name('quest.store');

Route::get('/discuss/answer/{id}', 'DiscussionController@answer')->name('discuss.answer');
Route::get('/discuss/answer-create/{id}', 'DiscussionController@answerStore')->name('discuss.answer.store');
Route::get('/discuss/{id}', 'DiscussionController@index')->name('discuss');


Route::group([
    'middleware' => ['web', 'auth', 'locale', 'admin']], function () {
        Route::get('/discuss-list', 'DiscussionController@list')->name('discuss.list');
        Route::post('/discuss-status-update','DiscussionController@statusUpdate')->name('discuss.status.update');
        Route::post('/discussion-delete','DiscussionController@deleteDiscussion')->name('discuss.delete');
        Route::get('/discuss-category', 'DiscussionController@create')->name('discuss-category');
        Route::get('/discuss-category-create', 'DiscussionController@store')->name('discuss-store');
        Route::get('/discuss-category-edit/{id}', 'DiscussionController@edit')->name('discuss.edit');
        Route::get('/discuss-category-update/{id}', 'DiscussionController@update')->name('discuss.update');
        Route::get('/discuss-category-delete/{id}', 'DiscussionController@destroy')->name('discuss.destroy');

        Route::get('/destination-create', 'DestinationController@create')->name('destination.create');
        Route::post('/destination-store', 'DestinationController@store')->name('destination.store');
        Route::get('/destination-list', 'DestinationController@list')->name('destination.list');
        Route::get('/destination-edit/{id}', 'DestinationController@edit')->name('destination.edit');
        Route::post('/destination-update/{id}', 'DestinationController@update')->name('destination.update');
        Route::get('/destination-delete/{id}', 'DestinationController@destroy')->name('destination.destroy');

        Route::get('/destination/sidebar/{id}', 'SidebarController@index');
        Route::get('/destination/sidebar/create/{id}', 'SidebarController@create');
        Route::post('/destination/sidebar/create/{id}', 'SidebarController@store');
        Route::get('/destination/sidebar/{id}/edit', 'SidebarController@edit');
        Route::post('/destination/sidebar/{id}/edit', 'SidebarController@update');
        Route::get('/destination/sidebar/{id}/delete', 'SidebarController@destroy');

        Route::get('/travelguide-create', 'TravelController@create')->name('travelguide.create');
        Route::post('/travelguide-store', 'TravelController@store')->name('travelguide.store');
        Route::get('/travelguide-list', 'TravelController@list')->name('travelguide.list');
        Route::get('/travelguide-edit/{id}', 'TravelController@edit')->name('travelguide.edit');
        Route::post('/travelguide-update/{id}', 'TravelController@update')->name('travelguide.update');
        Route::get('/travelguide-delete/{id}', 'TravelController@destroy')->name('travelguide.destroy');

        Route::get('/event-create', 'EventController@create')->name('event.create');
        Route::post('/event-store', 'EventController@store')->name('event.store');
        Route::get('/event-list', 'EventController@list')->name('event.list');
        Route::get('/event-edit/{id}', 'EventController@edit')->name('event.edit');
        Route::post('/event-update/{id}', 'EventController@update')->name('event.update');
        Route::get('/event-delete/{id}', 'EventController@destroy')->name('event.destroy');

        Route::get('/attraction-create', 'AttractionController@create')->name('attraction.create');
        Route::post('/attraction-store', 'AttractionController@store')->name('attraction.store');
        Route::get('/attraction-list', 'AttractionController@list')->name('attraction.list');
        Route::get('/attraction-edit/{id}', 'AttractionController@edit')->name('attraction.edit');
        Route::post('/attraction-update/{id}', 'AttractionController@update')->name('attraction.update');
        Route::get('/attraction-delete/{id}', 'AttractionController@destroy')->name('attraction.destroy');
 }
 );

Route::get('/destination', 'DestinationController@index')->name('destination');
Route::get('/destination/{id}', 'DestinationController@show')->name('destination.show');
Route::get('/destination/{id}/{temp}', 'DestinationController@showByid')->name('destination.showByid');

Route::get('/travelguide', 'TravelController@index')->name('travelguide');
Route::get('/travelguide/{id}', 'TravelController@show')->name('travelguide.show');

Route::get('/event', 'EventController@index')->name('event');
Route::get('/event/{id}', 'EventController@show')->name('event.show');

Route::get('/attraction', 'AttractionController@index')->name('attraction');
Route::get('/attraction/{id}', 'AttractionController@show')->name('attraction.show');
// whereRaw('month(created_at) in (10,11,12)')
Route::get('test', function() {
    
    $data = \DB::table('gmz_tour')->where(\DB::raw('month(package_start_date)'),'>=',3)->orWhere(\DB::raw('month(package_end_date)'),'<=',3)->select('id', 'package_start_date', 'package_end_date')->get();
    dd($data);
});


