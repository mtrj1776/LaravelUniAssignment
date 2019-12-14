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

<nav aria-label="Page navigation example">
        <div class="col-lg-1 col-offset-6 centered">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#!" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#!">1</a></li>
          <li class="page-item"><a class="page-link" href="#!">2</a></li>
          <li class="page-item"><a class="page-link" href="#!">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#!" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
</div>
@endsection