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
            @foreach ($user->posts as $post)
            <tr><td><a href='{{$user->post}}'>{{$user->post}}</a></td></tr>
            {{-- <tr><td>{{$user->post->thread->id}}</td></tr> --}}
            
            {{-- <select name="thread">
                @foreach ($user->threads as $thread)
                <option value="{{ $thread->id }}">
                    {{ $thread->name }}
                </option>

            </select> --}}
            @endforeach
            </td></tr>
       </ul>

</table>

@endsection