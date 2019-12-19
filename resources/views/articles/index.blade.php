@extends('layout.layout')

@section("title","article")

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @foreach($articles as $article)
               <div class="article m-b-20">
                   <div class="title">
                       <h2><a href="{{ route('articles.show',$article->id) }}">{{ $article->title }}</a></h2>
                   </div>
                   <p><img src="{{ asset('images/banner.jpg') }}" alt="" class="image image-full" /> </p>
                   <p>
                       {{ $article->excerpt }}
                   </p>
               </div>


            @endforeach
        </div>
        </div>
    </div>

@endsection
