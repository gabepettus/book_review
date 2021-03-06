<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;

use App\Models\Review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a list of all reviews.
     *
     * @return Response
     */
    public function list()
    {
        $reviews = Review::orderBy('created_at','desc')->get();

        return view('reviews.reviews')->with(['reviews' => $reviews ]);
    }

    /**
     * Create a new review. redirects to originating page
     *
     * @param  Request  $request
     */
    public function create(ReviewRequest $request)
    {
        $review = new Review;

        $review->book_id = $request->book_id;
        $review->rating = $request->rating;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->reviewer = $request->reviewer;

        $review->save();

        return back();
    }  
}