@extends('theme')
@section('content')
@if($data!=null && count($data)>0)
<div class="page-section section ">
    <div >
        <div class="row">
            <div class="col-12">
                <form action="#">				
                    <div class="cart-table table-responsive ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            
                            <tbody >
                                @foreach($data as $i)
                                <tr class="product">
                                    
                                    <input type="hidden" class="product_id" value="{{$i->productID}}">
                                    <input type="hidden" class="product_quantity" value="1">
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/uploads/{{$i->productImage}}" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">{{$i->productName}}</a></td>
                                    <td class="pro-price"><span>${{$i->productPrice}}</span></td>
                                    
                                    <td class="pro-addtocart"><button class="addToCartBtn">add to cart</button></td>
                                    <td class="pro-remove "><a href="#" class="delete-from-wishlist"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </form>	
                
            </div>
        </div>
    </div>
</div>
@elseif($data!=null && count($data)==0)
<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/wishlist.png"  class="img-fluid mb-4 mr-3" style="padding-right: 50px; margin-top:30px">
    <h3><strong>Your Wishlist is Empty</strong></h3>
    <h4>Add something to make me happy :)</h4>
    <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">continue shopping</a>
</div>

@elseif($data==null)
<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/wishlist.png"  class="img-fluid mb-4 mr-3" style="padding-right: 50px; margin-top:30px">
    <h3><strong>Your wishlist is Empty</strong></h3>
    <h4>Log in to save your favorite itmes</h4>
    <a href="/login" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">Log in </a>
</div>
@endif
@endsection