<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $books = Book::orderBy('author','asc')->get();
    return view('books/booklist', [
        'books' => $books
    ]);
});

Route::get('/books', [BookController::class, 'index']);

/**
 * Add A New Book
 */
Route::post('/Book', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:5',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $book = new Book;
    $book->name = $request->name;
    $book->save();

    return redirect('/');
});

/**
 * Delete An Existing Book
 */
Route::delete('/book/{book}', function (Book $book) {
    $book->delete();

    return redirect('/');
});