<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;

use App\Http\Requests\BookRequest;

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

        return view('books.bookList')->with(['books' => Book::hydrate($exampleBooks)]);
    }


    /**
     * lists exiting books
     * 
     * @return Response
     * 
     * */
    public function list()
    {
        $books = Book::orderBy('Author','asc')->get();
            return view('books.bookList')->with(['books' => $books ]);
    }


    /**
     * View details of specific book with reviews
     * takes book_id
     *
     * @param  unsignedBigInteger $id
     * @return Response
     *
     * */
    public function details($id)
    {
        $reviews = Review::where('book_id',$id)->orderBy('created_at','desc')->get();

        $book = Book::whereId($id)->first();
            return view('reviews.reviewList')->with(['book' => $book, 'reviews' => $reviews ]);
    }


    /**
     * Create a new book.
     *
     * @param  BookRequest  $request
     *
     * */
    public function create(BookRequest $request)
    {

        $photoName = time().'.'.$request->photo->extension();
        
        $book = new Book;

        $book->name = $request->name;
        $book->author = $request->author;
        $book->date_published = $request->date_published;
        $book->photo = $request->photo->storeAs('bookImages',$photoName);

        $book->save();

        return redirect('/bookList');
    }   
}