<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\order_items;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationEmail;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Session;
use PDF; 
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\stock_notifier;

class CheckoutController extends Controller
{
    public function index()
    {
        $data = Cart::where('userID', Auth::user()->id)->get();
        return view('checkout',['donnee' => $data]);
    }

    public function placeOrder(Request $req)
    {
   
            $order = new order;
            $order->id;
            $order->userID = Auth::user()->id;
            $order->name = $req->name;
            $order->lastname = $req->lastname;
            $order->address1 = $req->address1;
            $order->address2 = $req->address2; ;
            $order->state = $req->state;
            $order->email = $req->email;
            $order->zipcode = $req-> zipcode;
            $order->phone = $req->phone;
            $order->ordernumber = 'order#'.rand(100000, 999999);
            $order->status = 'confirmed';
            $order->message = $req->input('message');
            $order->save();
    
            $data = Cart::where('userID', Auth::user()->id)->get();
            foreach ($data as $item) {
                order_items::create([
                    'order_id' => $order->id,
                    'productID' => $item->productID,
                    'productQuantity' => $item->productQuantity,
                    'productPrice' => $item->productPrice,
                    'productName' => $item->productName,
                    'productImage' => $item->productImage,
                ]);
                product::where('id', $item->productID)->decrement('productStock', $item->productQuantity);
            }
            Cart::where('userID', Auth::user()->id)->delete();
            if($req->payment_mode == "Paid with PayPal"){
                return response ()->json (['status', 'Order Placed Successfully']);
            }
            redirect ('/')->with('status', 'Order Placed Successfully');
        }  


        public function placeOrderWithPaymentOndelivery(Request $req){
            $order = new order;
            $order->id;
            $order->userID = Auth::user()->id;
            $order->name = $req->name;
            $order->lastname = $req->lastname;
            $order->address1 = $req->address1;
            $order->address2 = $req->address2; ;
            $order->state = $req->state;
            $order->email = $req->email;
            $order->zipcode = $req-> zipcode;
            $order->phone = $req->phone;
            $order->ordernumber = 'order#'.rand(100000, 999999);
            $order->status = 'pending';
            $order->message = $req->input('message');
            $order->save();
    
            $data = Cart::where('userID', Auth::user()->id)->get();
            foreach ($data as $item) {
                order_items::create([
                    'order_id' => $order->id,
                    'productID' => $item->productID,
                    'productQuantity' => $item->productQuantity,
                    'productPrice' => $item->productPrice,
                    'productName' => $item->productName,
                    'productImage' => $item->productImage,
                ]);
                product::where('id', $item->productID)->decrement('productStock', $item->productQuantity);
            }
            Cart::where('userID', Auth::user()->id)->delete();
            $link = url('http://127.0.0.1:8000/confirmation' . $order->id);
            $data = [
            'link' => $link,
             ];
             Mail::to($req->email)->send(new OrderConfirmationEmail($data));
             return view('emailsent');   
        }
       public function setOrderStatus(Request $req){
           $order = order::find($req->order_id);
           $order->status = $req->status;
           $order->save();
           return response()->json(['status' => 'success']);
       }

       public function getOrder(){
           $orders = order::where('userID', Auth::user()-> id)->get();
           return view('orderconfirmation', ['orders' => $orders]);

       }  
       public function getOrderDetails(){
           $order = order::where('userID', Auth::user()-> id)->first();
           $orderItems = order_items::where('order_id', $order->id)->get();
           $orders = order::where('userID', Auth::user()-> id)->get();
           return view('myorders', ['orders' => $orders, 'orderItems' => $orderItems]);
       }

       public function stockEmailNotify(Request $req){
           $stockNotifier = new stock_notifier;
           $stockNotifier->product_id = $req->product_id;
           $stockNotifier->email = $req->email;
           $stockNotifier->save();
           return response()->json(['status' => 'success']);
       }


}


