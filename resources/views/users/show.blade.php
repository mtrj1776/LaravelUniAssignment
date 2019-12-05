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
       </ul>
</table>

@endsection