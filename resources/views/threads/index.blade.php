@extends('layouts.main')


@section('title', 'Threads')


@section('content')

<style>
    table, th, td
    {
        border: 1px solid darkslateblue;
        
    }
</style>
<table align = "center">
    <tr>
            <td><h3>Thread</h3></td>
            <th><h3>Posts</h3></th>
            <th><h3>Likes</h3></th>
            <th><h3>Last Updated</h3></th>
    </tr>
        <ul>
            @foreach($threads as $thread)
            <tr>
            <td>
                <a href='/threads/{{$thread->id}}'>{{$thread->name}}</a>
                <td>{{$thread->likes}}</td>
                <td>{{$thread->likes}}</td>
                <td>{{$thread->created_at}}</td>
            </td>
            </tr>
            @endforeach
        </ul>
</table>

@endsection