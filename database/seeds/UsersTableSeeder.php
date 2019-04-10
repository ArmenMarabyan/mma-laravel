<?php

use Illuminate\Database\Seeder;
use Mma\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
    		'name' => 'user_login',
            'email' => 'user_email@gmail.com',
            'password' => bcrypt('secret'),
            'is_admin' => 1,
    	]);

    }
}
