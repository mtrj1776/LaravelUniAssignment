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
        $thread = new Thread();
        $thread->name = "Test Thread Title";
        $thread->created_by_user_id = 1;
        $thread->save();

        // Generate random data
        factory(App\Thread::class, 50)->create();
    }
}
