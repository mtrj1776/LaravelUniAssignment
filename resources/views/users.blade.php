@extends('layouts.main')

@section('body')

<table>
    <tr>
        <th>Username</th>
    </tr>
        <ul>
            @foreach($users as $user)
            <tr><td><a href='/users/{{$user->display_name}}'>{{$user->display_name}}</a></td></tr></a>
            @endforeach
        </ul>
</table>

@stop