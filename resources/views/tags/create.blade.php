@extends('layouts.main')


@section('title', 'Create Tag')


@section('content')
    <form method="POST" action="{{ route('tags.store') }}">
        @csrf
        <p>Name: <input type="text" name="name" value="{{ old('name') }}"></p>

        <input type="submit" value="Submit">
        <br><a href="{{ route('tags.index')}}">Cancel</a>
    </form>
@endsection
