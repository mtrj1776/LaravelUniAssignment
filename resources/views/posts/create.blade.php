@extends('layouts.main')


@section('title', 'Create Post')


@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Post Comment: <input type="text" name="post_comment" value="{{ old('post_comment') }}"></p>

        <input type="submit" value="Submit">
        <br><a href="{{ redirect()->back() }}">Cancel</a>
    </form>
@endsection