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
Route::get('/articles/{id}', 'ArticlesController@show');

Route::get('/about', function () {
    return view('about');
});
