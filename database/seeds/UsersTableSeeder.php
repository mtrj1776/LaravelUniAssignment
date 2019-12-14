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
        $user->display_name = "Jason1977";
        $user->email = "mtrj1776@hotmail.co.uk";
        $user->permission_level = "administrator";
        $user->password = 'jason1234';
        $user->save();
            
        // Generate random data
        factory(App\User::class, 50)->create();
    }
}
