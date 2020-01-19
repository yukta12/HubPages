@extends('layout.layout')

@section('additional-head')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div class="title">New Article</div>

{{--            @if($errors->any())--}}
{{--                <div class="has-text-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}


            <form method="POST" action="/articles">
    @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input {{ $errors->has('title')?'is-danger' :"" }}" placeholder="Enter Title" name="title" id="title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="tag" class="label">Tags</label>
                    <div class="control select is-multiple is-block">
                        <select name="tags[]" id="tags" multiple class="is-block">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea  class="textarea {{ $errors->has('excerpt')?'is-danger' :"" }}" placeholder="Enter Excerpt" name="excerpt" id="excerpt" rows="5" cols="30"> {{ old('excerpt') }}</textarea>
                        @if($errors->has('excerpt'))
                            <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="Body" class="label">Body</label>
                    <div class="control">
                        <textarea  class="textarea {{ $errors->has('body')?'is-danger' :"" }}" placeholder="Enter Body" name="body" id="body" rows="15" cols="30"> {{ old('body') }}</textarea>
                        @if($errors->has('body'))
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @endif
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
