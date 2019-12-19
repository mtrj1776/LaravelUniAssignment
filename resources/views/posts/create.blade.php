@extends('layouts.app')


@section('title', 'Create Post')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

@section('content')
@auth
<div class="row justify-content-center pt-3">
    <div id="root">
            <h2>Create Post With Ajax</h2>
        
            <div id="root">
                <ul>
                    <li v-for="post in posts">@{{ post.post_comment }}</li>
                </ul>
                Thread: <input type="text" id="input" v-model="threadID">
                Post: <input type="text" id="input" v-model="newPost">
                <button  class="btn btn-success btn-lg" @click="createPost">Post Reply</button>
            </div>
    </div>
</div>
@endsection
@section('bodyscript')
<script>
    var app = new Vue({
        el: "#root",
        data: {
            posts: [],
            newPost: '',
            threadID: '',
        },
        methods:{
            createPost:function(){
                axios.post("{{ route('api.posts.store') }}", {
                    post_comment: this.newPost,
                    user_id: {{auth()->user()->id}},
                    thread_id: this.threadID,
                })
                .then(response=> {
                    this.newPost='';
                })
                .catch(response=>{
                    console.log(response);
                })
            }
        }
    });
</script>
@else
<div class="row justify-content-center pt-3">
<p>{{__('Only logged in users can create a post.')}}</p>
</div>
@endauth
@endsection