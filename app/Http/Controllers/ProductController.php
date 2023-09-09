<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Review;
use App\Models\discount;


class ProductController extends Controller{
    public function getProduct(Request $request){
        $name = $request->input('query');
        $category = $request->input('category');
        $cat = $request->productCategory;
        $sort = $request->sort;
        $show = $request->show;
        if ($name !== null) {
            $lastname = $name;
            $request->session()->put('lastname', $lastname);
        } else {
            $lastname = $request->session()->get('lastname', '');
        }

        if ($category !== null) {
            $lastcategory = $category;
            $request->session()->put('lastcategory', $lastcategory);
        } else {
            
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
            if ($show == null) {
                $data = $query->paginate(8);
            } else {
                $data = $query->paginate($show);
            }
            
            $products = $this->getDiscountedProducts($data);
    return view('list', ['products' => $products , 'donnee' => $data]);
    
    }
    public function bestSellersProducts(Request $request){
        $data = product::orderByDesc('productSoldTimes')->take(10)->get();
        $arrivals = product::orderByDesc('created_at')->take(8)->get();
        $arrivals = $this->getDiscountedProducts($arrivals);
        $data = $this->getDiscountedProducts($data);
        $bestdeals = discount::orderByDesc('discount_percentage')->take(6)->get();
        $products = [];
        foreach ($bestdeals as $discount) {
        $product = Product::find($discount->productID);
        if ($product) {
        $discountedPrice = $product->productPrice - ($product->productPrice * $discount->discount_percentage / 100);
        $discounted = true;

        $products[] = [
            'product' => $product,
            'discountedPrice' => $discountedPrice,
            'discounted' => $discounted,
            'start_date' => $discount->start_date ?? null,
            'end_date' => $discount->end_date ?? null,
        ];
    }
    $upto = discount::orderByDesc('discount_percentage')->first();
    $maxdate = discount::orderByDesc('end_date')->first();
}

        return view('welcome', ['bestselling' => $data,'arrivals' => $arrivals,'bestdeals' => $products,'upto' => $upto,'maxdate' => $maxdate]);
    }
  
    public function show(Request $req)
{
    $id = $req->id;
    $product = Product::query()->where('id', $id)->first();
    $reviews = Review::query()->where('product_id', $id)->get();
    $relatedproducts = Product::query()->where('globalCategory', $product->globalCategory)->inRandomOrder()->take(10)->get();

    $discountedPrice = 0;
    $discounted = false;

    $discount = Discount::query()->where('productID', $product->id)->first();
    if ($discount != null) {
        $discountedPrice = $product->productPrice - ($product->productPrice * $discount->discount_percentage / 100);
        $discounted = true;
    }

    $productData = [
        'product' => $product,
        'discountedPrice' => $discountedPrice,
        'discounted' => $discounted,
        'start_date' => $discount ? $discount->start_date : null,
        'end_date' => $discount ? $discount->end_date : null,
    ];

    return view('single-product', ['reviews' => $reviews, 'productData' => $productData, 'relatedproducts' => $relatedproducts]);
}

public function getDiscountedProducts($products)
{
    $discountedProducts = [];
    
    foreach ($products as $product) {
        $discountedPrice = 0;
        $discounted = false;
    
        $discount = discount::query()->where('productID', $product->id)->first();
        if ($discount !== null) {
            $discountedPrice = $product->productPrice - ($product->productPrice * $discount->discount_percentage / 100);
            $discounted = true;
        }
    
        $discountedProducts[] = [
            'product' => $product,
            'discountedPrice' => $discountedPrice,
            'discounted' => $discounted,
            'start_date' => $discount->start_date ?? null,
            'end_date' => $discount->end_date ?? null,
        ];
    }
    
    return $discountedProducts;
}



    
   
}


    

   
 

