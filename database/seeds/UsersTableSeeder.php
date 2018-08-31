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
            'role' => 'admin',
            'profile' => 'https://picsum.photos/40?random',
        ];

        $user2 = [
            'name' => 'Linden Burgess',
            'email' => 'linden@burgess.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'profile' => 'https://picsum.photos/40/?random122',
        ];

        User::create($user1);
        User::create($user2);

        factory(User::class, 23)->create();
    }
}
