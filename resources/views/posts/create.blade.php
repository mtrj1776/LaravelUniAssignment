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

            <br>Thread:<br> <input type="text" id="inputThread" v-model="threadID" placeholder="{{$thread->id}}">
            {{-- <input id="threadID" type="text" name="threadID" :value="{{$thread->id}}"> --}}
            <br><br>Post:<br> <textarea type="text" id="input" v-model="newPost" cols="50" rows="10"></textarea>
            <br><br><button  class="btn btn-success btn-lg" @click="createPost">Post Reply</button>
            <br><br><a class="btn btn-secondary" href="{{ route('threads.show', [$thread->id]) }}">Back</a>
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