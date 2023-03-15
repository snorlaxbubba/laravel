<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::create([
            'name' => 'John',
            'email' => 'example@email.co',
            'password' => bcrypt('Password1!')
        ]);

        User::create([
            'name' => 'Jane',
            'email' => 'doe@email.com',
            'password' => bcrypt('Password1!')
        ]);

        User::create([
            'name' => 'Joe',
            'email' => 'joe@email.com',
            'password' => bcrypt('Password1!')
        ]);

    }
}
