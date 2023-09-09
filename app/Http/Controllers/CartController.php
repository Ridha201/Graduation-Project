<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\discount;

class CartController extends Controller
{
    public function addProduct(request $request){

        $product_id = $request->input('product_id');
        $product_qte = $request->input('product_quantity');

        $prod = Product::where('id',$product_id)->first();
        

        if(Auth::check()){
            $cartitem = Cart::where('productID', $product_id)->where('userID', Auth::user()->id)->exists();
            if($cartitem){
                $cart = Cart::where('productID', $product_id)->where('userID', Auth::user()->id)->first();
                $cart->productQuantity  = $cart->productQuantity + $product_qte;
                $cart->save();
                return response()->json(['status'=> 'updated ']);
            }
            else{
            $discount = discount::where('productID', $product_id)->first();
            $cartitem = new Cart();
            $cartitem->productID = $product_id;
            $cartitem->userID = Auth::user()->id;
            $cartitem->ProductQuantity = $product_qte;
            if ($discount !== null && $discount->start_date <= now() && $discount->end_date >= now()){
                $cartitem->ProductPrice = $prod->productPrice - ($prod->productPrice * $discount->discount_percentage / 100);
            } else {
                $cartitem->ProductPrice = $prod->productPrice;
            }
            
            $cartitem->ProductName = $prod->productName;
            $cartitem->ProductImage = $prod->productImage;
            $cartitem->save();
            return response()->json(['status'=> 'added']);
            }

        }else{
            return response()->json(['status'=> 'not logged in']);
        }
    }
    public function cartCount(){
        $user = Auth::user();
        $cartCount = Cart::where('userID', $user->id)->count();
        return response()->json(['count'=> $cartCount]);
    }

    public function getCart(Request $request)
{
    $data = null;
    if(Auth::check()){
        $user = Auth::user();
        $data = Cart::where('userID', $user->id)->get();
        
        foreach($data as $cartItem) {
            $product = Product::find($cartItem->productID);
            $cartItem->productStock = $product->productStock;
        }
    }
    return view('cart', ['data' => $data]);
}

    public function modifyCart(Request $request){
        $product_id = $request->input('product_id');
        $newVal = $request->input('new_val');
        $cart = Cart::where('productID', $product_id)->where('userID', Auth::user()->id)->first();
        $cart->productQuantity  = $newVal;
        $cart->save();
        return response()->json(['status'=> 'updated ']);
    }

    public function priceCount(){
        $user = Auth::user();
        $cart = Cart::where('userID', $user->id)->get();
        $total = 0;
        foreach($cart as $item){
            $total = $total + $item->productPrice*$item->productQuantity;
        }
        return response()->json(['total'=> $total]);
    }

  public function deleteProduct (Request $request){
        $product_id = $request->input('product_id');
        $cart = Cart::where('productID', $product_id)->where('userID', Auth::user()->id)->first();
        $cart->delete();
        return response()->json(['status'=> 'deleted ']);
    }

    public function validateCart(Request $request){
        $user = Auth::user();
        $cart = Cart::where('userID', $user->id)->get();
        
        foreach($cart as $item){
            $product = Product::find($item->productID);
            $discount = discount::where('productID', $product->id)->first();
            if($product->productStock < $item->productQuantity){
                $item->productQuantity = $product->productStock;
                $item->save();
            }
            if ( $discount !== null && $discount->start_date <= now() && $discount->end_date >= now()){
                $item->ProductPrice = $product->productPrice - ($product->productPrice * $discount->discount_percentage / 100);
                $item->save();
            } else {
                $item->ProductPrice = $product->productPrice;
                $item->save();
            }
        }
        return response()->json(['status'=> 'validated ']);
        
    }

    
    


 

}
