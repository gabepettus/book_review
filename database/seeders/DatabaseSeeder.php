<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
            DB::table('books')->insert([
                'id' => '1',
                'name' => 'James and the Giant Peach',
                'author' => 'Roald Dahl',
                'date_published' => '1961-07-17',
                'photo' => 'bookImages/JamesAndTheGiantPeach.jpg'
                // 'photo' => 'https://en.wikipedia.org/wiki/James_and_the_Giant_Peach#/media/File:JamesAndTheGiantPeach.jpg'
            ]);
        
            DB::table('books')->insert([
                'id' => '2',
                'name' => 'Zen and the Art of Motorcycle Maintenance: An Inquiry into Values',
                'author' => 'Robert M. Pirsig',
                'date_published' => '1974-04-01',
                'photo' => 'bookImages/Zen_motorcycle.jpg'
                // 'photo' => 'https://en.wikipedia.org/wiki/Zen_and_the_Art_of_Motorcycle_Maintenance#/media/File:Zen_motorcycle.jpg'
            ]);
    }
}