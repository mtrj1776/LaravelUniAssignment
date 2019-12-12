@extends('layouts.main')


@section('title', 'Thread')


@section('content')

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
        <th><h3>Tags</h3></th>
        <th><h3>Posted By</h3></th>
        <th><h3>Last Updated</h3></th>
    </tr>
        <ul>
            @foreach($thread->posts as $post)
            <tr>
                <td>{{$post->post_comment}}</td>
                <td>
                    @foreach($post->tags as $tag)
                        <a href='/tags/{{$tag->name}}'>{{$tag->name}}</a>
                    @endforeach
                </td>
                <td><a href='/users/{{$post->user->id}}'>{{$post->user->name}}</a></td>
                <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
        </ul>
</table>

<div>
        
        <a href="{{ route('posts.create')}}">Create Post</a>
</div>

@endsection