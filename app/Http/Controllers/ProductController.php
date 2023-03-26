<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller{


    public function getProduct(Request $request){
        $cat = $request->productCategory;
        $sort = $request->sort;
        $show = $request->show;
        $query = product::query()->where('productCategory', $cat);
        if ($sort == 'price-desc') {
            $query->orderByDesc('productPrice');
        } elseif ($sort == 'price-asc') {
            $query->orderBy('productPrice');
        } elseif ($sort == 'name-asc') {
            $query->orderBy('productName');
        } elseif ($sort == 'name-desc') {
            $query->orderByDesc('productName');
        } else {
            $query->latest();
        }

        if( $show == null)
            $data = $query->paginate(8);
        else 
            $data = $query->paginate($show);
    
        return view('list', ['donnee' => $data]);
    }
    public function bestSellersProducts(Request $request){
        $data = product::orderByDesc('productSoldTimes')->take(10)->get();
        return view('welcome', ['donnee' => $data]);
        
    }
    public function newArrivalProducts(Request $request){
        $data = product::orderByDesc('created_at')->take(10)->get();
        return view('welcome', ['arrival' => $data]);
    }
    public function show(Request $req){
     $id = $req->id;
     $product = product::query()->where('id', $id)->first();
     return view('single-product', ['product' => $product]);
    }
   
}


    

   
 

