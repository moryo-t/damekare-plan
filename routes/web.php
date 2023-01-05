<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


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

Route::get('/', 'App\Http\Controllers\FrontController@index');

Route::get('/map', 'App\Http\Controllers\MapController@index');

Route::get('/posts', 'App\Http\Controllers\PostController@show');
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@detail');
Route::get('/posts/destroy/{id}', 'App\Http\Controllers\PostController@destroy');

Route::get('/favorite', 'App\Http\Controllers\FavoriteController@show');
Route::get('/favorite/{id}', 'App\Http\Controllers\FavoriteController@detail');
Route::get('favorite/destroy/{id}', 'App\Http\Controllers\FavoriteController@destroy');

Route::get('/search', 'App\Http\Controllers\SearchController@index');
Route::post('/search', 'App\Http\Controllers\SearchController@show');
Route::get('/search/detail', 'App\Http\Controllers\SearchController@detail')->name('updatePage');
Route::post('/message/{id}', 'App\Http\Controllers\SearchController@chat');

Route::get('/search/{id}/route', 'App\Http\Controllers\RouteController@search_route');
Route::get('/favorite/{id}/route', 'App\Http\Controllers\RouteController@favorite_route');
Route::get('/posts/{id}/route', 'App\Http\Controllers\RouteController@post_route');

Route::post('/map/favorite', 'App\Http\Controllers\MapController@favorite');
Route::post('/map/plan', 'App\Http\Controllers\MapController@plan');


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

