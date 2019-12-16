@extends('layouts.app')


@section('title', 'Create Post')

@section('content')
@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Post Comment: <input type="text" name="post_comment" value="{{ old('post_comment') }}"></p>

        <input type="submit" value="Submit">
        <br><a href="{{ redirect()->back() }}">Cancel</a>
    </form>


        {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <div id="root">
            <p>@{{ message }}</p>
        </div>

        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    message: "It Works!",
                },
            })
            </script> --}}


@endsection