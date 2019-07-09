<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        App\Models\Book::create([
            'name' => 'Truyen Kieu',
            'authorID' => '1'
        ]);
    }
}
