@extends('layouts.main')

@section('title', 'User')

@section('content')

<style>
        table, th, td
        {
            border: 1px solid darkslateblue;
        }
    </style>
    <table align = "center">
    <tr>
        <th>Username</th><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr>
    </tr>
        <ul>
            <tr><td>{{$user->name}}</td></tr>
            <tr><td>{{$user->display_name}}</td></tr>
            <tr><td>{{$user->email}}</td></tr>
            <tr><td>{{$user->permission_level}}</td></tr>
            <tr><td>{{$user->permission_level}}</td></tr>
            {{-- @foreach ($user->threads as $thread) --}}
            {{-- <a href='/threads/{{$user->threads->id}}'>{{$user->thread->name}}</a> --}}
            {{-- @endforeach --}}
            {{-- <tr><td>
            <select name="thread">
                @foreach ($user->threads as $thread)
                <option value="{{ $thread->id }}">
                    {{ $thread->name }}
                </option>
                @endforeach
            </select>
            </td></tr> --}}
       </ul>
</table>

@endsection