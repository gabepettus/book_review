<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
     /**
     * Display a list of all review.
     *
     * @return Response
     */
    public function list()
    {
        $reviews = Review::orderBy('created_at','desc')->get();

        return view('reviews.reviews')->with(['reviews' => $reviews ]);
   }

    /**
     * Create a new review.
     *
     * @param  Request  $request
     */
    public function create(Request $request)
    {
        // TODO validate
        $review = new Review;

        $review->book_id = $request->book_id;
        $review->rating = $request->rating;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->reviewer = "anon";

        $review->save();

        // need to add book id
        // return redirect('/reviews'); 
        return redirect('/');
    }  
}
