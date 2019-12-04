<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //setup basic post to test before creating with factories
        $post = new Post();
        //one to many relationship with user, wants the id of the user
        $post->user_id = 1;
        //one to many relationship with thread, wants the id of the thread
        $post->thread_id = 1;
        $post->post_content = "This is the first post of the first thread";
        $post->save();
        
        //factories setup
        factory(App\Post::class, 50)->create();
        
    }
}
