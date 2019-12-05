@extends('layouts.main')


@section('title', 'Thread')


@section('body')

<style>
    table, th, td
    {
        border: 1px solid darkslateblue;
    }
</style>
<table align = "center">
    <tr>
        <style>
        {
            text-align:center;
        }
        </style>
        <td><h3>{{$thread->name}}</h3></td>
        <th><h3>Likes</h3></th>
        <th><h3>Last Updated</h3></th>
    </tr>
        <ul>
            @foreach($thread->posts as $post)
            <tr>
                <td>{{$post->post_comment}}</td>
                <td>{{$post->likes}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
        </ul>
</table>

@endsection