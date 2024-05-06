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
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'username' => 'john',
                'password' => bcrypt('password'),
                'user_type_id' => 1, // superadmin
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'username' => 'jane',
                'password' => bcrypt('password'),
                'user_type_id' => 2, // admin
            ],
            [
                'name' => 'Guest User',
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