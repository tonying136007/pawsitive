<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'john@example.com',
                'username' => 'john',
                'password' => bcrypt('password'),
                'user_type_id' => 1, // superadmin
            ],
            [
                'email' => 'jane@example.com',
                'username' => 'jane',
                'password' => bcrypt('password'),
                'user_type_id' => 2, // admin
            ],
            [
                'email' => 'guest@example.com',
                'username' => 'guest',
                'password' => bcrypt('password'),
                'user_type_id' => 3, // guest
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}