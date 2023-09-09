<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\discount;

class WishlistController extends Controller
{
    public function addProduct(Request $req)
    {
        $product_id = $req->input('product_id');

        $prod = product::where('id', $product_id)->first();
        $wishlist = Wishlist::where('productID', $product_id)->where('userID', Auth::user()->id)->first();

        if(Auth::check() && $wishlist == null){
            $wishlistitem = Wishlist::where('productID', $product_id)->where('userID', Auth::user()->id)->exists();
            $discount = discount::where('productID', $product_id)->first();
            $wishlistitem = new Wishlist();
            $wishlistitem->productID = $product_id;
            $wishlistitem->userID = Auth::user()->id;
            if ($discount !== null && $discount->start_date <= now() && $discount->end_date >= now()){
                $wishlistitem->ProductPrice = $prod->productPrice - ($prod->productPrice * $discount->discount_percentage / 100);
            } else {
                $wishlistitem->ProductPrice = $prod->productPrice;
            }
            
            $wishlistitem->ProductName = $prod->productName;
            $wishlistitem->ProductImage = $prod->productImage;
            $wishlistitem->save();
            return response()->json(['status'=> 'added']);

        }elseif(Auth::check() && $wishlist != null){
            $wichlist = Wishlist::where('productID', $product_id)->where('userID', Auth::user()->id)->first();
            $wishlist->delete();
        }
        else{
            return response()->json(['status'=> 'not logged in']);
        }
    }

    public function wishlistCount(){
        $user = Auth::user();
        $wishlistCount = Wishlist::where('userID', $user->id)->count();
        return response()->json(['count'=> $wishlistCount]);
    }

    public function getWishlist(Request $request){

        $data = null;
        if(Auth::check()){
            $user = Auth::user();
            $data = Wishlist::where('userID', $user->id)->get();
            
            foreach($data as $wishlistitem) {
                $product = product::find($wishlistitem->productID);
                $wishlistitem->productStock = $product->productStock;
            }
        }
        return view('wishlist', ['data' => $data]);
    }

    public function deleteProduct (Request $request){
        $product_id = $request->input('product_id');
        $wishlist = Wishlist::where('productID', $product_id)->where('userID', Auth::user()->id)->first();
        $wishlist->delete();
        return response()->json(['status'=> 'deleted ']);
    }
  



   


}
