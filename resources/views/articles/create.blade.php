@extends('layout.layout')

@section('additional-head')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div class="title">New Article</div>
            <form method="POST" action="/articles">
    @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Enter Title" name="title" id="title">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea  class="textarea" placeholder="Enter Excerpt" name="excerpt" id="excerpt" rows="5" cols="30"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="Body" class="label">Body</label>
                    <div class="control">
                        <textarea  class="textarea" placeholder="Enter Body" name="body" id="body" rows="15" cols="30"></textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>




    </div>
@endsection
