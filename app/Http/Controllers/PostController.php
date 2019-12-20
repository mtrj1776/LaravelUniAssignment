<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $thread = Thread::findOrFail($id);

        return view('posts.create')->with('thread', $thread);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
        'post_comment' => 'required|max:255',
        'thread_id' => 'required|',
        'user_id' => 'required|',
        // get user name and id
        ]);
    
        session()->flash('message', 'Data Validated Successfully');

        $a = new Post;
        $a->post_comment = $validatedData['post_comment'];
        $a->thread_id =$validatedData['thread_id'];
        $a->user_id =$validatedData['user_id'];
        $a->save();

        $b = new Thread();
        $b = Thread::find($validatedData['thread_id']);
        // touch command to update the updated_at variable of the parent thread
        // allows ordering of most up to date thread on the threads index page
        $b->touch();

        return redirect()->back()->with('message', 'New Post Created Successfully!');
            
    
    }

    public function apiStore(Request $request)
    {
        //
        $validatedData = $request->validate([
            'post_comment' => 'required|max:255',
            'thread_id' => 'required|',
            'user_id' => 'required|',
            // get user name and id
            ]);
        
        session()->flash('message', 'Data Validated Successfully');

        $a = new Post;
        $a->post_comment = $validatedData['post_comment'];
        $a->thread_id =$validatedData['thread_id'];
        $a->user_id =$validatedData['user_id'];
        $a->save();
        session()->flash('message', 'Data Validated Successfully');
        $b = new Thread();
        $b = Thread::find($validatedData['thread_id']);
        // touch command to update the updated_at variable of the parent thread
        // allows ordering of most up to date thread on the threads index page
        $b->touch();
        return $a;
    }

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }
    public function storeAjax(Request $request)
    {
        $post = Post::updateOrCreate(
            ['post_comment' => $request->post_comment],
        );

        session()->flash('message', 'Data Validated Successfully');

        return json($user);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = new Post();
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|',
            'post_comment' => 'required|max:255',
            'edited_by' => 'required|',
            ]);
        
            session()->flash('message', 'Data Validated Successfully');

            $a = Post::find($validatedData['id']);
            $a->post_comment = $validatedData['post_comment'];
            $a->edited_by =$validatedData['edited_by'];
            $a->save();

            return redirect()->route('threads.show', array($a->thread))->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // store thread to enable return view
        $thread = Thread::findOrFail($post->thread_id);
        $post->delete();
        //session()->flash('message', 'Post Deleted Successfully');
        return redirect()->route('threads.show', array($thread))->with('message', 'Post Deleted Successfully');
    }

    public function imageShow()
    {
        return view('image/Upload');
    }

    public function imageStore(Request $request)
    {
   
        $request->validate([
            'name' => 'required|',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = Post::find($request['name']);
        $post->image_path = $imageName;
        $post->save();

        return back()->with('success','You have successfully upload image.')->with('image',$imageName);

    }
}
