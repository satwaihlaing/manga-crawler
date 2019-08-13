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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("sitemap.xml", array(
    "as"   => "sitemap",
    "uses" => "FrontendController@sitemap",
));

Route::get('/', 'FrontendController@index');
Route::get('page/{num}', 'FrontendController@index')->where('num', '.*');
Route::get('detail/{link}', 'FrontendController@detail')->where('link', '.*');
Route::get('read/{link}', 'FrontendController@read')->where('link', '.*');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::post('favourite', 'FrontendController@favourite');
    Route::get('library', 'FrontendController@library');
    Route::post('removeFavourite', 'FrontendController@unfav');
});

Route::get('/home', 'HomeController@index')->name('home');
