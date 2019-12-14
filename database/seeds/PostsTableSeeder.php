<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

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
        // $post->tags()->attach(1);
        // $post->tags()->attach(12);
        // $post->tags()->attach(16);
        
        // Generate random data
        factory(App\Post::class, 500)->create();

        $tags = App\Tag::all();
        // Generate random data
        App\Post::all()->each(function ($post) use ($tags){
            $post->tags()->attach( $tags->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
        
    }
}
