<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Manager',
                'email' => 'manager@mail.com',
                'password' => bcrypt('manager123'),
                'role' => 'manager'
            ],
            [
                'name' => 'Pelayan',
                'email' => 'pelayan@mail.com',
                'password' => bcrypt('pelayan123'),
                'role' => 'pelayan'
            ],
            [
                'name' => 'Pelayan2',
                'email' => 'pelayan2@mail.com',
                'password' => bcrypt('pelayan123'),
                'role' => 'pelayan'
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@mail.com',
                'password' => bcrypt('kasir123'),
                'role' => 'kasir'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
