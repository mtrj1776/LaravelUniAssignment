@extends('layouts.app')


@section('title', 'Users')


@section('content')
<div class="row pl-4">
        <a href="{{ route('users.create') }}", button class="btn btn-success btn-lg" type="submit">{{__('Create User')}}</button></a>
</div>

<div class="row justify-content-center pt-3">
        <div class="col-auto">
                <table class="table table-borderless">
                <thead class="thead-light">
                        <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Joined</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach($users as $user)
                        <tr>
                                <td><a class="navbar-text" href='/users/{{$user->id}}'>{{$user->display_name}}</a></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at}}</td>
                        </tr>
                        @endforeach
                </tbody>
                </table>
                <div class="row justify-content-center pt-3">
                        {{ $users->links() }}
                </div>
        </div>
</div>
@endsection