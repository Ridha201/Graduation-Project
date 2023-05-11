@extends('theme')
@section('content')

<div class="col-sm-12 empty-cart-cls text-center">
    <img src="assets/images/emailConfirmation.PNG"  class="img-fluid mb-4 mr-3 mt-40">
    <h3><strong>An email has been sent for confirmation.</strong></h3>
    <h4><strong>Check your inbox please! </strong></h4>
    
    <a href="/" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color : #e59053; border: 1px solid #f18327;">Back to home</a>
</div>

@endsection