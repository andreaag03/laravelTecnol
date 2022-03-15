<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Review::create([
            'user_id' =>$request->input('user_id'),
            'product_id' =>$request->input('product_id'),
            'comment' =>$request->input('comment'),
        ]);
        return redirect()->route('product.show',['id'=>$request->input('product_id')]);
    }


    public function delete(Request $request)
    {
        $id = $request->input('review_id');
        Review::destroy($id);
        return redirect()->route('product.show',['id'=>$request->input('product_id')]);
    }

    public function getUserName($reviewId)
    {
        $review = Review::find($reviewId);

        if(!isset($review)) {
            echo 'This id doesn\'t exist in the database.';
            die;
        }

        echo $review->user->username;
        die;
    }
}
