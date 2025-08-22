<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'Christopher',
                'lastname' => 'Chase',
                'email' => 'christopherchase011@gmail.com',
                'password' => bcrypt('chasechase011'),
                'role' => Role::Superadmin,
                'birthday' => '1997-07-01',
                'address' => '123 Main St, Anytown, USA'
            ],
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
                'role' => Role::User,
                'birthday' => '1990-01-01',
                'address' => '456 Elm St, Anytown, USA'
            ],
        ];
        User::insert($users);
    }
}
