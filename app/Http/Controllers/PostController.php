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
    public function create()
    {
        //
        return view('posts.create');
    }

    public function apiStore(Request $request){
    //
    $validatedData = $request->validate([
        'post_comment' => 'required|max:255',
        'thread_id' => 'required|',
        'user_id' => 'required|',
        // get user name and id
        ]);
    
        $a = new Post;
        $a->post_comment = $validatedData['post_comment'];
        $a->thread_id =$validatedData['thread_id'];
        $a->user_id =$validatedData['user_id'];
        $a->save();

        return $a;
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
    
        $a = new Post;
        $a->post_comment = $validatedData['post_comment'];
        $a->thread_id =$validatedData['thread_id'];
        $a->user_id =$validatedData['user_id'];
        $a->save();

        $b = new Thread();
        $b = Thread::find($validatedData['thread_id']);
        $b->touch();
        //$b->save();

        return redirect()->back()->with('message', 'Data saved successfully!');
            
    
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

        return Response::json($user);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
