<?php

use Illuminate\Database\Seeder;
use App\Signature;

class SignaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $signature = new Signature();
        $signature->signature = "hello this is a signature";
        $signature->user_id = 1;
        $signature->save();

        // Generate random data
        factory(App\Signature::class, 50)->create();
    }
}
