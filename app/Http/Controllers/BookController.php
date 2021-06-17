<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return view('books.books')->with(['books' => Book::hydrate($exampleBooks)]);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  Create a new task.
    public function create(Request $request)
    {
        // TODO validate
        $book = new Book;

        $book->name = $request->name;
        $book->author = $request->author;
        $book->date_published = $request->date_published;
        $book->photo = $request->photo;

        $book->save();

        return redirect('/books');
    }   
}