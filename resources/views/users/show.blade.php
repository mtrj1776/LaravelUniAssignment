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
            <tr><td><a href="mailto:someone@example.com">{{$user->email}}</a></td></tr>
            <tr><td>{{$user->permission_level}}</td></tr>

            {{-- <td><tr>
             <select name="thread">
                 @foreach ($user->threads as $thread)
                    <option value="{{ $thread }}"
                    @if($thread == old('thread', $thread->option))
                      selected = "selected"
                    @endif
                    >{{ $thread->name }}</option>

                 @endforeach
             </select>

            
            </td></tr> --}}
       </ul>

</table>

<form method="POST"
        action="{{ route('users.destroy', ['id' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <p><a href="{{ route('users.index') }}">Back</a></p>
@endsection