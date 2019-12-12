@extends('layouts.main')


@section('title', 'Delete User')


@section('content')
    <form method="POST" action="{{ route('users.destroy', ['id' => $user->user_id]) }}">
        @csrf
        @method('DELETE');
        <button type="submit">Delete</button>
    </form>

    <p><a href="{{ route('users.index') }}">Back</a></p>
@endsection