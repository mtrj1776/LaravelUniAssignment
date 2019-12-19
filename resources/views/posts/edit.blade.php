@extends('layouts.app')

@section('title', 'Edit Post')
@section('content')

<div class="row justify-content-center pt-3">
    <div class="col-5">
        @auth
        @can('canEdit', $post)
            <div id="PostReplyForm" class="mt-2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', ['id' => $post->id, 'post_comment' => "post_comment", 'edited_by' => \Auth::user()->display_name]) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="post_comment" id="post_comment" rows="5">{{$post->post_comment}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="submit" id="post_comment" value="post_comment">{{__('Post Edit')}}</button>
                        </div>
                    </form>
                </div>
            </div>

            @else
            {{-- Notify user does not have permission to create post (not necessarily) --}}
            <div class="row justify-content-center pt-3">
                <p>{{__('No Permission to Edit Post')}}</p>
            </div>
        @endcan
        @endauth
    </div>
</div>

@endsection
