<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

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

// Route::get('/', function () { return view('welcome'); });
Route::get('/', [BookController::class,'list']);

// Route::get('/books', [BookController::class,'index']);
Route::get('/books', [BookController::class,'list']);
Route::get('/book/{book}', [BookController::class,'details']);
Route::post('/book', [BookController::class,'create']);

Route::get('/reviews', [ReviewController::class,'list']);
Route::post('/review', [ReviewController::class,'create']);

// Route::delete('/book/{book}', [BookController::class,'delete']);

// Route::auth();