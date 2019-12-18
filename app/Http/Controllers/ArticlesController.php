<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index(){
        $articles = Article::take(3)->latest('updated_at')->get();
        return view('articles.index',[
            'articles'=>$articles
        ]);
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.article',[
            'article' => $article
        ]);
    }
    public function create(){
        return view('articles.create');
    }
    public function store(){
        //dd("hello");
        //dump(request()->all());

        $article = new Article();

        $article->title = request('title');

        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }
}
