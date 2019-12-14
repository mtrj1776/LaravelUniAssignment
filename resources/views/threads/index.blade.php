@extends('layouts.app')


@section('title', 'Threads')


@section('content')

<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-borderless">
            <thead class="thead-light">
              <tr>
                <th>Thread</th>
                <th>Posts</th>
                <th>Created By</th>
                <th>Last Updated</th>
              </tr>
            </thead>
            <tbody>
                    @foreach($threads as $thread)
                    <tr>
                        <td><a href='/threads/{{$thread->id}}'>{{$thread->name}}</a></td>
                        <td>{{$thread->posts->count()}}</td>
                        <td>{{$thread->user->name}}</td>
                        <td>{{$thread->updated_at}}</td>
                    </tr>
                    @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection