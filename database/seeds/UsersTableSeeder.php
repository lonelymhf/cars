<?php

use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('123456'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
