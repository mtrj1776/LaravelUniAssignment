<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Jason";
        $user->email = "jason18776@dhun.com";
        $user->display_name = "Jason1977";
        $user->permission_level = "administrator";
        $user->save();
            
        // Generate random data
        factory(App\User::class, 50)->create();
    }
}
