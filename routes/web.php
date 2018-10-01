<?php
use App\Screen;

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
    return redirect('screens');
});

Auth::routes();

Route::get('node', 'NodeController@landing');
// Moved Node Function into Routes file to stop Auth Requirement to view screen frontage
Route::get('screens/node/{screen}', 'NodeController@node')->name('screenfront');

//Route::get('/home', 'HomeController@index')->name('home');

//********** Screens Section *************
//Manager
Route::get('screens', 'ScreensController@index');
Route::get('screens/list', 'ScreensController@show');

// Create Screens
Route::get('screens/create', 'ScreensController@create');
Route::post('screens', 'ScreensController@store');

//Edit Screens
Route::patch('screens/{screen}', 'ScreensController@update');
Route::get('screens/{screen}/edit', 'ScreensController@edit');

//Delete Screen
Route::get('screens/{id}/destroy', 'ScreensController@destroy');

//Push Active Contents Event Fire
Route::post('screens/{screen}/pushactive', 'ScreensController@pushActive');
Route::post('screens/{screen}/pushfooter', 'ScreensController@pushFooter');

//Screen Content
//List
Route::get('screens/{screen}/content', 'ScreenContentController@index');

//Update Screen Content (add existing content)
Route::patch('screens/{screen}/content/update', 'ScreenContentController@update');

//Remove Content from Screen
Route::delete('screens/{screen}/{content}/remove', 'ScreenContentController@destroy');

//Activate Content on a given screen
Route::post('screens/{screen}/{content}/activate', 'ContentStatusController@store');
Route::post('screens/{screen}/{content}/deactivate', 'ContentStatusController@destroy');

//********** Content Section *************
//Add Content
Route::get('content/create', 'ContentController@create');
Route::post('content/create', 'ContentController@store');

//Edit Content
Route::patch('content/{content}', 'ContentController@update');
Route::get('content/{content}/edit', 'ContentController@edit')->name('content.edit');

//Delete Content
Route::delete('content/{id}/destroy', 'ContentController@destroy');

//Show Content
Route::get('content', 'ContentController@index');
Route::get('content/{content}', 'ContentController@show');
