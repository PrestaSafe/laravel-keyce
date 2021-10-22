<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        $user = new \App\Models\User;
        $user->name = 'Guillaume';
        $user->email = 'guillaume.batier@gmail.com';
        $user->password = bcrypt('87654321@');
        $user->save();
    }
}
