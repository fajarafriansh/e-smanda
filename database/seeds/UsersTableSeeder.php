<?php

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
                'email'          => 'admin@neutron.com',
                'password'       => '$2y$10$E8WUvnEkYEHtzUh/lkZtsugkgAEKkPePGdQ8mmViCAAwC0eGtAolW',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
