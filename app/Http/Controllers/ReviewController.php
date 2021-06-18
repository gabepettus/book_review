<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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

        // TODO function does not belong here move to helper function file
        $title = "";
        if (preg_match("/^\s*$/",$request->title) || empty($request->title)) {
            // looks like split is adding on leading and trailing space
            $titleArray = preg_split("//", $request->review);

            for ($i=1; $i < count($titleArray)-1; $i=$i+1) {
                if ( preg_match("/[\.\?!]/", $titleArray[$i]) ) {
                    // find end of sentance add  ellipses force exit of loop
                    $title = $title . " ...";
                    $i = count($titleArray);
                } elseif ( $i === 1 ) {
                    $title = $title . strtoupper($titleArray[$i]);
                } elseif ( ($i != count($titleArray)-1 ) && ( preg_match("/\s/",$titleArray[$i])) ) {
                    // add space and cap value to title
                    $title = $title . $titleArray[$i] . strtoupper($titleArray[$i+1]);
                    $i = $i+1;
                } else {
                    $title = $title . $titleArray[$i];
                }
            }
        } else {
            $title = $request->title;
        }

        // TODO validate
        $review = new Review;

        $review->book_id = $request->book_id;
        $review->rating = $request->rating;
        $review->title = $title;
        $review->review = $request->review;
        $review->reviewer = "anon";

        $review->save();

        // need to add book id
        // return redirect('/reviews'); 
        return back();
    }  
}