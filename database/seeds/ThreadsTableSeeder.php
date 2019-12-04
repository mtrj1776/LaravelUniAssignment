<?php

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //setup basic post to test before creating with factories
        $thread = new Thread();
        //one to many relationship with user, wants the id of the user
        $thread->user_id = 1;
        $thread->save();

        //factories setup
        factory(App\Thread::class, 50)->create();
    }
}
