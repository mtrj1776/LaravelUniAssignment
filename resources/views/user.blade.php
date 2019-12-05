@extends('layouts.main')

@section('body')

<table>
    <tr>
        <th>Username</th>
    </tr>
        <ul>
            <tr><td>{{$user->name}}</td></tr>
            <tr><td>{{$user->display_name}}</td></tr>
            <tr><td>{{$user->email}}</td></tr>
            <tr><td>{{$user->permission_level}}</td></tr>
       </ul>
</table>

@stop