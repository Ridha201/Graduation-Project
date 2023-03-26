@extends('theme')
@section('content')

<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/orderplaced.jpg"  class="img-fluid mb-4 mr-3">
    <h3><strong>Your order has been placed successfully</strong></h3>
    
    <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">Back to home</a>
</div>

@endsection