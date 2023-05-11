<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\product;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\MBD;
use App\Models\PSU;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $review = new Review;
        $review->product_id = $request->input('product_id');
        $review->email = $request->input('email');
        $review->name = $request->input('name');
        $review->review = $request->input('review');
        $review->star = $request->input('product_rating');
        $review->save();
        return redirect()->back();
    }

    public function totalReview(Request $request)
    {
        $id = $request->input('product_id');
        $total1 = Review::query()->where('product_id', $id)->where('star',5)->count();
        $total2 = Review::query()->where('product_id', $id)->where('star',4)->count();
        $total3 = Review::query()->where('product_id', $id)->where('star',3)->count();
        $total4 = Review::query()->where('product_id', $id)->where('star',2)->count();
        $total5 = Review::query()->where('product_id', $id)->where('star',1)->count();
        $avg = number_format(Review::query()->where('product_id', $id)->avg('star'), 1);
        $total = Review::query()->where('product_id', $id)->count();
    
        return response ()->json([
            'total1' => $total1,
            'total2' => $total2,
            'total3' => $total3,
            'total4' => $total4,
            'total5' => $total5,
            'avg' => $avg,
            'total' => $total,

        ]);
    }

  

}





