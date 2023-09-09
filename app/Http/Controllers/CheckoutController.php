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
            $order->order_type = 'regular';
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
                product::where('id', $item->productID)->increment('productSoldTimes', $item->productQuantity);
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
            $order->order_type = 'regular';
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
                product::where('id', $item->productID)->increment('productSoldTimes', $item->productQuantity);
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
        $stock = stock_notifier::where('product_id', $req->product_id)->where('email', $req->email)->first();
        if($stock){
            return response()->json(['status' => 'error']);
        }else{
           $stockNotifier = new stock_notifier;
           $stockNotifier->product_id = $req->product_id;
           $stockNotifier->email = $req->email;
           $stockNotifier->save();
           return response()->json(['status' => 'success']);
        }
       }

       public function PCBuilderOrder(Request $req)
       {
        if($req->type == 'paypal'){
           $order = new order();
           $order->userID = Auth::user()->id;
           $order->name = $req->name;
           $order->lastname = $req->lastname;
           $order->address1 = $req->address1;
           $order->address2 = $req->address2;
           $order->state = $req->state;
           $order->email = $req->email;
           $order->zipcode = $req->zipcode;
           $order->phone = $req->phone;
           $order->ordernumber = 'order#' . rand(100000, 999999);
           $order->status = 'confirmed';
           $order->order_type = 'Builder';
           $order->save();
       
           $productIds = [
               'cpu' => $req->cpu,
               'mbd' => $req->mbd,
               'ram' => $req->ram,
               'gpu' => $req->gpu,
               'psu' => $req->psu,
               'storage' => $req->storage,
               'case' => $req->case,
               'cooler' => $req->cooler
           ];
       
           foreach ($productIds as $productKey => $productId) {
               $product = product::find($productId);
               $orderItem = new order_items();
               $orderItem->order_id = $order->id;
               $orderItem->productID = $product->id;
               $orderItem->productQuantity = 1;
               $orderItem->productPrice = $product->productPrice;
               $orderItem->productName = $product->productName;
               $orderItem->productImage = $product->productImage;
               $orderItem->save();
               product::where('id', $productId)->decrement('productStock', 1);
               product::where('id', $productId)->increment('productSoldTimes', 1);
           }
           
        }elseif($req->type == 'ondelivery'){
            $order = new order();
            $order->userID = Auth::user()->id;
            $order->name = $req->name;
            $order->lastname = $req->lastname;
            $order->address1 = $req->address1;
            $order->address2 = $req->address2;
            $order->state = $req->state;
            $order->email = $req->email;
            $order->zipcode = $req->zipcode;
            $order->phone = $req->phone;
            $order->ordernumber = 'order#' . rand(100000, 999999);
            $order->status = 'pending';
            $order->order_type = 'Builder';
            $order->save();
        
            $productIds = [
                'cpu' => $req->cpu,
                'mbd' => $req->mbd,
                'ram' => $req->ram,
                'gpu' => $req->gpu,
                'psu' => $req->psu,
                'storage' => $req->storage,
                'case' => $req->case,
                'cooler' => $req->cooler
            ];
        
            foreach ($productIds as $productKey => $productId) {
                $product = product::find($productId);
        
                $orderItem = new order_items();
                $orderItem->order_id = $order->id;
                $orderItem->productID = $product->id;
                $orderItem->productQuantity = 1;
                $orderItem->productPrice = $product->productPrice;
                $orderItem->productName = $product->productName;
                $orderItem->productImage = $product->productImage;
                product::where('id', $productId)->decrement('productStock', 1);
                product::where('id', $productId)->increment('productSoldTimes', 1);
                $orderItem->save();
            }
            $link = url('http://127.0.0.1:8000/confirmation' . $order->id);
            $data = [
            'link' => $link,
             ];
             Mail::to($req->email)->send(new OrderConfirmationEmail($data));
             return view('emailsent');   

        }
        return response()->json(['status' => 'success']);
       
       }

}


