@extends('theme')
@section('content')
@if($data!=null && count($data)>0)
<div class="page-section section ">
    <div class="">
        <div class="row">
            <div class="">
                <form action="/checkout">				
                    <!-- Cart Table -->
                    <div class="cart-table  ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                              @foreach($data as $item)
                                <tr data-product-container="{{$item->id}}">
                                    <input type="hidden" class="cart_id" id="product_id_{{ $item->id }}" value="{{$item->id}}">
                                    <input type="hidden" class="product_stock"  value="{{$item->productStock}}" >
                                    <input type="hidden" class="product_id" id="product_id_{{ $item->productID }}" value="{{$item->productID}}">
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/uploads/{{$item->productImage}}" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">{{$item->productName}}</a></td>
                                    <td class="pro-price"><span>${{$item->productPrice}}</span></td>
                                    <td class="pro-quantity"><div class="pro-qty"><input type="text" class="product_quantity"value="{{$item->productQuantity}}"></div></td>
                                    
                                    <td class="pro-remove"><a class="delete-from-cart"href="#"><i class="fa fa-trash-o "></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    
                </form>	
                    
                <div class="">

                   
                      

                    <!-- Cart Summary -->
                    <input type="hidden" id="" {{$total = 0;}}>
                    <div class="col-lg-12" style="margin-left: 53px;">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Cart Summary</h4>
                                @php
                                foreach($data as $item) 
                                    $total += $item->productPrice * $item->productQuantity ;
                                @endphp
                                <p>Sub Total <span class="total_price_count">${{$total}}.00</span></p>
                                <p>Shipping Cost <span>$10.00</span></p>
                                <h2>Grand Total <span class="grand_total">${{$total+10}}.00</span></h2>
                                <div class="cart-summary-button" style="margin-top: 20px">
                                    <a href="checkout"><button class="checkout-btn" type="submit">Checkout</button></a>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@elseif($data!=null && count($data)==0)
<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/emptyCart.png"  class="img-fluid mb-4 mr-3">
    <h3><strong>Your Cart is Empty</strong></h3>
    <h4>Add something to make me happy :)</h4>
    <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">continue shopping</a>
</div>

@elseif($data==null)
<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/emptyCart.png"  class="img-fluid mb-4 mr-3">
    <h3><strong>Your Cart is Empty</strong></h3>
    <h4>Log in to add itemes to your cart</h4>
    <a href="/login" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">Log in </a>
</div>
@endif
@endsection