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
        //setup basic user to test before creating with factories
            $user = new User();
            $user->name = "Jason";
            $user->display_name = "Jason1977";
            $user->permission_level = "administrator";
            $user->save();
            
        //factories setup 50 random users
        factory(App\User::class, 50)->create();
    }
}
