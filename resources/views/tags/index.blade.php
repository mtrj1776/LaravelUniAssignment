@extends('layouts.app')


@section('title', 'Tags')


@section('content')
<div>
    <a href="{{ route('tags.create')}}">Create Tag</a>
</div>

<div>
    <style>
    table, th, td
    {
        border: 1px solid darkslateblue;
        
    }
    </style>
    <table align = "center">
        <tr>
            <th>Tag ID</th>
            <th>Name</th>
        </tr>
            <ul>
               @foreach ($tags as $tag)
               <tr>
                   <th>{{ $tag->id }}</th>
                   <td>{{ $tag->name }}</td>
               </tr>
               @endforeach
           </ul>
        </table>
</div>

@endsection