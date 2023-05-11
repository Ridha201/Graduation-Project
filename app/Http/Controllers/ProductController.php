<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Review;


class ProductController extends Controller{
    public function getProduct(Request $request){
        $name = $request->input('query');
        $category = $request->input('category');
        $cat = $request->productCategory;
        $sort = $request->sort;
        $show = $request->show;
        if ($name !== null) {
            // if name is not null, set lastname to name
            $lastname = $name;
            // store lastname in session
            $request->session()->put('lastname', $lastname);
        } else {
            // if name is null, get the last stored lastname value from session
            $lastname = $request->session()->get('lastname', '');
        }

        if ($category !== null) {
            // if name is not null, set lastname to name
            $lastcategory = $category;
            // store lastname in session
            $request->session()->put('lastcategory', $lastcategory);
        } else {
            // if name is null, get the last stored lastname value from session
            $lastcategory = $request->session()->get('lastcategory', '');
        }


        if($name == null && $category == null){
            if($cat == null){
              if ( $lastcategory == "All Categories"){
                $query = Product::query()->where('productName', 'like', '%' . $lastname . '%');
                }
              else{
                 $query = Product::query()->where('productName', 'like', '%' . $lastname . '%')->where('globalCategory', 'like', '%' . $lastcategory . '%');
                }
            }
               
            else{
                $query = product::query()->where('productCategory', $cat);
            }
        }
        else{
            if ( $lastcategory == "All Categories"){
                $query = Product::query()->where('productName', 'like', '%' . $name . '%');
                }
              else{
                 $query = Product::query()->where('productName', 'like', '%' . $name . '%')->where('globalCategory', 'like', '%' . $category . '%');
                }
        }
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
            if ($show == null) 
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
     $reviews = Review::query()->where('product_id', $id)->get();
     $relatedproducts = product::query()->where('globalCategory', $product->globalCategory)->inRandomOrder()->take(10)->get();
     return view('single-product', ['reviews' => $reviews ,'product' => $product , 'relatedproducts' => $relatedproducts]);
    }

    
   
}


    

   
 

