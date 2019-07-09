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
    }
}
