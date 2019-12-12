@extends('layouts.main')


@section('title', 'Create User')


@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Name: <input type="text" name="name" value="{{ old('name') }}"></p>
        <p>Email: <input type="text" name="email" value="{{ old('email') }}"></p>
        <p>Display Name: <input type="text" name="display_name" value="{{ old('display_name') }}"></p>
        {{-- <p>Permission: <input type="text" name="permission_level" ></p> --}}

        <input type="submit" value="Submit">
        <br><a href="{{ redirect()->back()}}">Cancel</a>

        {{-- <form action="/users.index" target="_blank"> --}}

    </form>
@endsection