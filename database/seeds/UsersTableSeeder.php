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
        $user->name = "Mike";
        $user->display_name = "Mike1987";
        $user->email = "mtrj1776@hotmail.co.uk";
        $user->canCreate = 1;
        $user->canEdit = 0;
        $user->canDelete = 0;
        $user->permission_level = "user";
        $user->password = Hash::make('yourpassword');
        $user->save();
            
        // Generate random data
        factory(App\User::class, 50)->create();
    }
}
