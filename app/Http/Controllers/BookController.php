<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $exampleBooks = [
            [
                'id' => '1',
                'name' => 'James and the Giant Peach',
                'author' => 'Roald Dahl',
                'date_published' => '1961-07-17',
                'photo' => 'https://en.wikipedia.org/wiki/James_and_the_Giant_Peach#/media/File:JamesAndTheGiantPeach.jpg'
            ],
            [
                'id' => '2',
                'name' => 'Zen and the Art of Motorcycle Maintenance: An Inquiry into Values',
                'author' => 'Robert M. Pirsig',
                'date_published' => '1974-04-01',
                'photo' => 'https://en.wikipedia.org/wiki/Zen_and_the_Art_of_Motorcycle_Maintenance#/media/File:Zen_motorcycle.jpg'
            ],
        ];

        return view('books.index')->with(['books' => Book::hydrate($exampleBooks)]);
    }
}