@extends('layouts.app')


@section('title', 'Users')


@section('content')
<div>
        <button type="button" class="btn btn-success"><a href="{{ route('users.create')}}">Create User</a>
</div>

<div>
    <table class="table">
        <thead class="thead-light">
                <tr>
                        <a class="navbar-brand mr-auto">Username</a>
                </tr>
        </thead>
        <tbody>
                    @foreach($users as $user)
                    <tr>
                            <a class="navbar-text" href='/users/{{$user->id}}'>{{$user->display_name}}</a>
                    </tr>
                    @endforeach
        </tbody>
</div>
<div class="row">
        <div class="col-md-5 col-md-offset-5"></div>
</div>
@endsection