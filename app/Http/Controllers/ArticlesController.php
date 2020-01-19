<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
class ArticlesController extends Controller
{
    public function index(){
        if(request('tag')){
//            dd(request('tag'));
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;

        }else{
            $articles = Article::take(3)->latest('updated_at')->get();
        }

        return view('articles.index',[
            'articles' => $articles
        ]);
    }

//    public function show($id){
    public function show(Article $article){
//        $article = Article::findOrFail($id);
        return view('articles.article',[
            'article' => $article
        ]);
    }
    public function create(){
        $tags = Tag::all();
        return view('articles.create',compact('tags'));
    }
    public function store(){

//        request()->validate([
//            'title' => 'required',
//            'excerpt' => 'required',
//            'body' => 'required'
//        ]);
//        $article = new Article();
//        //dd("hello");
//        //dump(request()->all());
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();
        //Upr ka chiz niche funtion me kar diya
//        $this->validateData();
//
//
//        Article::create([
//            'title'=> \request('title'),
//            'excerpt'=> \request('excerpt'),
//            'body' => \request('body')
//        ]);

        $article = new Article($this->validateData());
        $article->user_id=1;
        $article->save();
        $article->tags()->attach(request('tags'));

        return redirect('/articles');
    }

    public function edit(Article $article){
//        $article = Article::findOrFail($id)
        return view('articles.edit',compact('article'));
    }
//    public function update($id){
    public function update(Article $article){
        //dump(request()->all());
//        $article = Article::findOrFail($id);
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();
//        Iske badle update method likh diya
        $article->update($this->validateData());
//        return redirect('/articles/'.$article->id);
        return redirect(route('articles.show',$article->id));
    }

    public function validateData(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' =>'exists:tags,id'
        ],[
            'title.required'=>'Ohh error in title',
            'tags.exists' => 'chal bhag!',
        ]);
//        return request()->validate([
//            'title' => 'required',
//            'excerpt' => 'required',
//            'body' => 'required',
//
//        ]);
    }
}
