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
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user Role',
            'email' => 'user@role.test',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('user');
    }
}
