<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user1 = [
            'name' => 'Spencer Wallace',
            'email' => 'spencer@wallace.com',
            'password' => Hash::make('password'),
        ];

        User::create($user1);
    }
}
