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
        $post = new Post();
        $post->thread_id = 1;
        $post->user_id = 1;
        $post->post_comment = "Test Post Comment";
        $post->save();
        
        // Generate random data
        factory(App\Post::class, 500)->create();
        
    }
}
