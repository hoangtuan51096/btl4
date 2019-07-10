<?php

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
        DB::table('users')->truncate();
        App\User::create([
            'account' => 'admin',
            'password' => bcrypt('1'),
            'email' => 'admin@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'admin'
        ]);
        App\User::create([
            'account' => 'admin1',
            'password' => bcrypt('1'),
            'email' => 'admin1@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'admin'
        ]);
        App\User::create([
            'account' => 'admin2',
            'password' => bcrypt('1'),
            'email' => 'admin2@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'admin'
        ]);
        App\User::create([
            'account' => 'user1',
            'password' => bcrypt('1'),
            'email' => 'user@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'user'
        ]);
        App\User::create([
            'account' => 'user2',
            'password' => bcrypt('1'),
            'email' => 'user2@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'user'
        ]);
        App\User::create([
            'account' => 'user3',
            'password' => bcrypt('1'),
            'email' => 'user3@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'user'
        ]);

    }
}
