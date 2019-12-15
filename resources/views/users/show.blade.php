@extends('layouts.app')

@section('title', 'User')

@section('content')

<div class="row justify-content-center pt-3">
    <div class="col-auto">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Thread</th>
                <th>Posts</th>
                <th>Created By</th>
                <th>Last Updated</th>
            </thead>
            <tbody>
                <td>{{$user->name}}</td>
                <td>{{$user->display_name}}</td>
                <td><a href="mailto:someone@example.com">{{$user->email}}</a></td>
                <td>{{$user->permission_level}}</td>
            </tbody>
          </table>

<form method="POST"
        action="{{ route('users.destroy', ['id' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-lg" type="submit">{{__('Delete User')}}</button>
    </form>

    <a href="{{ route('users.index') }}", button class="btn btn-secondary btn-lg" type="submit">{{__('Back')}}</button></a>

@endsection