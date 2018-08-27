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
            'admin' => true,
        ];

        $user2 = [
            'name' => 'Linden Burgess',
            'email' => 'linden@burgess.com',
            'password' => Hash::make('password'),
            'admin' => false,
        ];

        User::create($user1);
        User::create($user2);

        factory(User::class, 23)->create();
    }
}
