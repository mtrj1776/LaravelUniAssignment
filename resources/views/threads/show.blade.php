@extends('layouts.app')


@section('title', 'Thread')


@section('content')

<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-borderless">
            <thead class="thead-light">
                <tr>
                    <th>{{$thread->name}}</th>
                    <th>Created By</th>
                    <th>Last Updated</th>
                    <th>Tags</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($thread->posts as $post)
                    <tr>
                        <td>{{$post->post_comment}}</td>
                        <td><a href='/users/{{$post->user->id}}'>{{$post->user->name}}</a></td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <a href='/tags/{{$tag->name}}'>{{$tag->name}} | </a>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
            </tbody>
          </table>

          @auth
          <div id="PostReplyForm" class="mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store', ['post_comment' => "post_comment", 'thread_id' => $thread->id, 'user_id' => \Auth::user()->id]) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" placeholder="{{__('Type your reply here.')}}" name="post_comment" id="post_comment" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="submit">{{__('Post Reply')}}</button>
                        </div>
                    </form>
                </div>
            </div>
           </div>
           @else
                <p>{{__('Only logged in users can post a reply.')}}</p>
           @endauth
    </div>
</div>

@endsection