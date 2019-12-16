@extends('layouts.app')


@section('title', 'Thread')


@section('content')

<div class="row justify-content-center pt-3">
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

        <div class="row justify-content-center pt-3">
            {{-- {{ $thread->posts->links() }} --}}
        </div>

        @auth
            <div id="PostReplyForm" class="mt-2">
                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('posts.store', ['post_comment' => "post_comment", 'thread_id' => $thread->id, 'user_id' => \Auth::user()->id]) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-post-comment" placeholder="{{__('Type your reply here.')}}" name="post_comment" id="post_comment" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-lg" type="submit">{{__('Post Reply')}}</button>
                    </div>
                </form> --}}
                    <form method="POST" action="{{ route('posts.store', ['post_comment' => "post_comment", 'thread_id' => $thread->id, 'user_id' => \Auth::user()->id]) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-post-comment" placeholder="{{__('Type your reply here.')}}" name="post_comment" id="post_comment" rows="5" v-model="post_comment_box"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="submit">{{__('Post Reply')}}</button>
                        </div>
                    </form>
            </div>
        </div>

        @section('scripts')
        <script>
            const app = new Vue({
                el: '#app',
                data:
                {
                    posts: {},
                    post_comment_box: '',
                    thread: {{ $thread->toJson() }},
                    user: {{ Auth::check() ? Auth::user()->toJson() : 'null' }},
                }
                // setup the posts to load on the webpage first load
                mounted()
                {
                    this.getThreads();
                }
                // methods to perform actions in json
                methods:
                {
                    getThreads()
                    {
                        // use axios to get the posts 
                        axios.get(`/api/threads/${this.thread.id}/posts`)
                        .then((response) =>
                        {
                            // get the actual data from the response (the new post data)
                            this.posts = response.data
                        })
                        .catch(function (error)
                        {
                            // catch and output error to console for debugging
                            // should have popup to shwo to user in real application
                            console.log(error);
                        )}
                    },
                    postComment()
                    {
                        // send thread id
                        axios.post(`/api/threads/${this.thread.id}/post`, 
                        { // get what is needed to store the new post
                            api_token: this.user.api_token,
                            body: this.post_comment_box,
                        })
                        .then((response) =>
                        {
                            // what to do when response comes back
                            this.posts.unshift(response.data);
                            // empty out the page comment box
                            this.post_comment_box = '';

                        })
                        .catch(function (error) 
                        {
                            console.log(error);
                        })
                    }
                }
            })
            </script>
        @else
            <p>{{__('Only logged in users can post a reply.')}}</p>
        @endauth
    </div>
</div>
@endsection