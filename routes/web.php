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

use App\Article;

Route::get('/', function () {
    $articles = Article::take(3)->latest('updated_at')->get();
    return view('welcome',[
        'articles'=> $articles,
    ]);
});


Route::get('/articles', 'ArticlesController@index');
Route::post('/articles','ArticlesController@store');
Route::get('articles/create','ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::put('/articles/{article}','ArticlesController@update');
Route::get('/articles/{article}/edit','ArticlesController@edit');

Route::get('/about', function () {
    return view('about');
});
