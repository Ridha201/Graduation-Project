@extends('theme')
@section('content')

<style>
 
    td {
        font-size: 16px;
    font-weight: 600;
    color: #444444;
    }

.cart-table .table tbody tr td {
  text-align: center;
  border: none;
  padding: 0px 20px;
  vertical-align: middle;
  border-bottom: 1px solid #dddddd;
}
</style>

<head>
  <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap 4.3.1 CDN -->
  <link
    rel="stylesheet"
    
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
  />
  <!-- FontAwesome 4.7.0 CDN -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link rel="stylesheet" href="./style.css" />
  <title>Document</title>
</head>
<section class="h-100 gradient-custom">
    <div class=" py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div >
          <div class="card" >
            <div class="card-header ">
              <h5 class=" mb-0">Thanks for your Order, <span style="color: #e59053;">{{ explode(' ', Auth::user()->name)[0] }}</span>!</h5>
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" >Receipt</p>
                <p class="  mb-0" style="font-weight: 500; font-size:15px ">Order Number : {{$orders[0]->ordernumber}} </p>
              </div>
              <div class="shadow-0 border mb-4 cart-table ">
                <div class="card-body ">
                    <table class="table">
                        <thead>
                          <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-remove">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $total = 10; ?>
                          @foreach ($orderItems as $orderitem)
                            <?php $total += $orderitem->productPrice*$orderitem->productQuantity; ?>
                          <tr>
                            <td class="pro-thumbnail"><img src="assets/images/uploads/{{$orderitem->productImage}}" class="img-fluid" alt="Phone" width="100" height="100"></td>
                            <td class="pro-title">{{ substr($orderitem['productName'], 0, 17) }}</td>
                            <td class="pro-price">${{$orderitem->productPrice}}</td>
                            <td class="pro-quantity" style="margin-left:20px">{{$orderitem->productQuantity}}</td>
                            <td class="pro-remove">${{$orderitem->productPrice*$orderitem->productQuantity}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                
                  
                  <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <div class="row d-flex justify-content-center">
                    <div class="col-12">
                      @foreach ($orders as $key => $order)
                      @if ($order->status == "Processed")
                      <ul id="progressbar" class="text-center">
                        <li class="active step0"><img src="assets/images/CheckList.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px" ><b>Order <br />Processed</B></p></li>
                        <li class="step0"><img src="assets/images/Delivery.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Shipped</b></p></li>
                        <li class="step0"><img src="assets/images/Shipping.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />En Route</B></p></li>
                        <li class="step0"><img src="assets/images/Home.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Delivered</B></p></li>
                      </ul>
                      @elseif ($order->status == "Shipped")
                      <ul id="progressbar" class="text-center">
                        <li class="active step0"><img src="assets/images/CheckList.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Processed</b></p></li>
                        <li class="active step0"><img src="assets/images/Delivery.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Shipped</B></p></li>
                        <li class=" step0"><img src="assets/images/Shipping.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />En Route</B></p></li>
                        <li class="step0"><img src="assets/images/Home.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Delivered</B></p></li>
                      </ul>
                      @elseif ($order->status == "En Route")
                      <ul id="progressbar" class="text-center">
                        <li class="active step0"><img src="assets/images/CheckList.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold" style="margin-right: 15px"><B><b>Order <br />Processed</B></p></li>
                        <li class="active step0"><img src="assets/images/Delivery.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Shipped</B></p></li>
                        <li class="active step0"><img src="assets/images/Shipping.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />En Route</B></p></li>
                        <li class="step0"><img src="assets/images/Home.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px">Order <br />Delivered</B></p></li>
                      </ul>
                      @elseif ($order->status == "Delivered")
                      <ul id="progressbar" class="text-center">
                        <li class="active step0"><img src="assets/images/CheckList.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b><b>Order <br />Processed</b></p></li>
                        <li class="active step0"><img src="assets/images/Delivery.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Shipped</B></p></li>
                        <li class="active step0"><img src="assets/images/Shipping.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />En Route</B></p></li>
                        <li class="active step0"><img src="assets/images/Home.png" alt="" class="icon" style="margin-top:20px "/><p class="font-weight-bold"style="margin-right: 15px"><b>Order <br />Delivered</B></p></li>
                      </ul>
                      @endif
                      @endforeach
                    </div>
                  </div>
                  
                </div>
              </div>
              @foreach ($orders as $key => $order)

              @if ($key == 0) {{-- only display details for the first order --}}
                  <div class="d-flex justify-content-between pt-2">
                      <span class="fw-bold mb-0">Order Details</span>
                      
                  </div>
          
                  <div class="d-flex justify-content-between pt-2">
                      <span class="text-muted mb-0">Name : {{$order->name}}&nbsp{{$order->lastname}}</span>
                      
                  </div>
          
                  <div class="d-flex justify-content-between">
                      <span class="text-muted mb-0">Address : {{$order->address1}}</span>
                                       
                  </div>
          
                  <div class="d-flex justify-content-between">
                      <span class="text-muted mb-0">Address 2 : {{$order->address2}}</span>
                      <p>Sub Total : <span class="" style="font-weight: 1000">${{$total-10}}</span></p>
                  </div>
          
                  <div class="d-flex justify-content-between">
                      <span class="text-muted mb-0">State : {{$order->state}}</span>
                      <p>Shipping Fee : <span style="font-weight: 1000">$10.00</span></p>
                  </div>
          
                  <div class="d-flex justify-content-between">
                      <span class="text-muted mb-0">Phone number : {{$order->phone}}</span>
                  </div>
          
                  <div class="d-flex justify-content-between">
                      <span class="text-muted mb-0">Email : {{$order->email}}</span>
                      <h4>Grand Total : <span style="font-weight: 1000">${{$total}}</span></h4>   
                  </div>
              @endif
          
              @break($key == 0) {{-- break the loop after displaying the first order's details --}}
              
          @endforeach
         
          
          
          
          
          
          
  
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection