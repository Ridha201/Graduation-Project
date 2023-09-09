@extends('theme')
@section('content')
<link rel="stylesheet" href="assets/css/modal.css">
<div class=" ">
    <div class="">
        <div class="row">
            <div class=""  >

                <!-- Hero Slider Start -->
                <div class="hero-slider hero-slider-one " style="">

                    <!-- Hero Item Start -->
                    <div class="hero-item">
                        

                            <!-- Hero Content -->
                         

                            <!-- Hero Image -->
                            <div class="hero-image col" >
                               <img src="assets/images/Banner_1200x600.jpg" alt="Hero Image">
                            </div>
                        
                          
                    </div><!-- Hero Item End -->

                    <!-- Hero Item Start -->
                    <div class="hero-item">
                        <div class="row align-items-center justify-content-between">

                         

                            <!-- Hero Image -->
                            <div class="hero-image col">
                               <img src="assets/images/o202210040927156399.jpg" alt="Hero Image">
                            </div>
                        
                        </div>     
                    </div><!-- Hero Item End -->

                    <!-- Hero Item Start -->
                    <div class="hero-item">
                        <div class="row align-items-center justify-content-between">

      
                        
                            <!-- Hero Image -->
                            <div class="hero-image col">
                               <img src="assets/images/nb-20220513-1.jpg" alt="Hero Image">
                            </div>
                        
                        </div>     
                    </div><!-- Hero Item End -->

                </div><!-- Hero Slider End -->

            </div>
        </div>
    </div>
</div><!-- Hero Section End -->



<!-- Feature Product Section Start -->
<div class="product-section section mb-70">
    <div class="container">
        <div class="row">
            
            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="BEST SELLERS"><h1>BEST SELLERS</h1></div>
            </div><!-- Section Title End -->
            
            <!-- Product Tab Filter Start -->
          
            
            <!-- Product Tab Content Start -->
            <div class="col-12">
                <div class="tab-content">
                    
                    
                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade show active" id="tab-one">
                        
                        <!-- Product Slider Wrap Start -->
                        <div class="product-slider-wrap product-slider-arrow-one">
                            <!-- Product Slider Start -->
                            <div class="product-slider product-slider-4 row">
                                
                                @foreach ($bestselling as $best)
                                @php
                                $i = $best['product'];
                                $discountedPrice = $best['discountedPrice'];
                                $discounted = $best['discounted'];
                                $start_date = $best['start_date'];
                                $end_date = $best['end_date'];
                                @endphp
                                
                                <div class="col pb-20 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image product" >
                                            @if ($discounted && $start_date <= now() && $end_date >= now())
                                            <span class="label new">sale</span>
                                            @endif
                                            
            
                                            <a href="{{ route('single-product', ['id' => $i['id']]) }}" class="img"><img src="assets/images/uploads/{{$i['productImage']}}" alt="Product Image"></a>
            
                                            <div class="wishlist-compare">
                                                <a href="" data-tooltip="Wishlist" class="addToWhishlistBtn"><i class="ti-heart"></i></a>
                                            </div>
            
                                            <input type="hidden" class="product_id" value="{{$i->id}}">
                                            <input type="hidden" class="product_quantity" value="1">
                                            @if ($i['productStock'] > 0)
                                            <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart "></i><span>ADD TO CART</span></a>  
                                            @endif
            
                                            
                                            
            
                                        </div>
            
                                        <!-- Content -->
                                        <div class="content">
            
                                            <!-- Category & Title -->
                                            <div class="category-title">
            
                                                <a href="" class="cat">{{$i['productCategory']}}</a>
                                                <h5 class="title"><a href="">{{ substr($i['productName'], 0, 40) }}{{ strlen($i['productName']) > 40 ? "..." : "" }}</a></h5>
            
                                            </div>
            
                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">
            
                                                @if ($discounted && $start_date <= now() && $end_date >= now())
                                                <h5 class="price"><span class="old" style="color: red">${{$i['productPrice']}} </span>${{$discountedPrice}}</h5>
                                                @else
                                                <h5 class="price">${{$i['productPrice']}}</h5>
                                                @endif
                                                <div class="ratting">
                                                    @if ($i['productStock'] > 0)
                                                    <span class="availability"><span style="color: green; font-weight: 700 ;">In Stock</span></span>
                                                    @elseif ($i['productStock'] == 0)
                                                    <span class="availability"> <span style="color: red;font-weight: 700 ;">Out of Stock</span></span>
                                                    @endif
                                                </div>
            
                                            </div>
            
                                        </div>
            
                                    </div><!-- Product End -->
                                </div>
                                @endforeach


                            </div><!-- Product Slider End -->
                        </div><!-- Product Slider Wrap End -->
                        
                    </div><!-- Tab Pane End -->
                    
                    <!-- Tab Pane Start -->
                   
                    
                </div>
            </div><!-- Product Tab Content End -->
            
        </div>
    </div>
</div><!-- Feature Product Section End -->

<!-- Best Sell Product Section Start -->


<!-- Banner Section Start -->


<!-- Feature Section Start -->
<div class="feature-section section mb-60">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <!-- Feature Start -->
                <div class="feature feature-shipping">
                    <div class="feature-wrap">
                        <div class="icon"><img src="assets/images/icons/feature-van.png" alt="Feature"></div>
                        <h4>FAST SHIPPING</h4>
                        <p>3 WORKING DAYS</p>
                    </div>
                </div><!-- Feature End -->
            </div>
            
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <!-- Feature Start -->
                <div class="feature feature-guarantee">
                    <div class="feature-wrap">
                        <div class="icon"><img src="assets/images/icons/feature-walet.png" alt="Feature"></div>
                        <h4>MONEY BACK GUARANTEE</h4>
                        <p>Back within 15 days</p>
                    </div>
                </div><!-- Feature End -->
            </div>
            
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <!-- Feature Start -->
                <div class="feature feature-security">
                    <div class="feature-wrap">
                        <div class="icon"><img src="assets/images/icons/feature-shield.png" alt="Feature"></div>
                        <h4>SECURE PAYMENTS</h4>
                        <p>Payment Security</p>
                    </div>
                </div><!-- Feature End -->
            </div>
            
        </div>
    </div>
</div><!-- Feature Section End -->

<!-- Best Deals Product Section Start -->
<div class="product-section section mb-40">
    <div class="container">
        <div class="row">
            
            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="BEST DEALS"><h1>BEST DEALS</h1></div>
            </div><!-- Section Title End -->
            
            <!-- Product Tab Filter Start-->
            <div class="col-12">
                <div class="offer-product-wrap row">
                        
                    <!-- Product Tab Filter Start -->
                    <div class="col mb-30">
                        
                    </div><!-- Product Tab Filter End -->
                    
                    <!-- Offer Time Wrap Start -->
                    @php
                   
                    @endphp
                    <div class="col mb-30">
                        <div class="offer-time-wrap" style="background-image: url(assets/images/bg/offer-products.jpg)">
                            <h1><span>UP TO</span> {{$upto->discount_percentage}}%</h1>
                            <h3>QUALITY & EXCLUSIVE <span>PRODUCTS</span></h3>
                            <h4><span>LIMITED TIME OFFER</span> GET YOUR PRODUCT</h4>
                            <div class="countdown" data-countdown="{{$maxdate->end_date}}"></div>
                        </div>
                    </div><!-- Offer Time Wrap End -->

                    <!-- Product Tab Content Start -->
                    <div class="col-12 mb-30">
                        <div class="tab-content">

                            <!-- Tab Pane Start -->
                            <div class="tab-pane fade show active" id="tab-three">

                                <!-- Product Slider Wrap Start -->
                                <div class="product-slider-wrap product-slider-arrow-two">
                                    <!-- Product Slider Start -->
                                    <div class="product-slider product-slider-3">

                                        @foreach ($bestdeals as $bestdeal)
                                @php
                                $product = $bestdeal['product'];
                                $discountedPrice = $bestdeal['discountedPrice'];
                                $discounted = $bestdeal['discounted'];
                                $start_date = $bestdeal['start_date'];
                                $end_date = $bestdeal['end_date'];
                                @endphp
                                
                                <div class="col pb-20 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image product" >
                                            @if ($discounted && $start_date <= now() && $end_date >= now())
                                            <span class="label new">sale</span>
                                            @endif
                                            
            
                                            <a href="{{ route('single-product', ['id' => $product['id']]) }}" class="img"><img src="assets/images/uploads/{{$product['productImage']}}" alt="Product Image"></a>
            
                                            <div class="wishlist-compare">
                                                <a href="" data-tooltip="Wishlist" class="addToWhishlistBtn"><i class="ti-heart"></i></a>
                                            </div>
            
                                            <input type="hidden" class="product_id" value="{{$product->id}}">
                                            <input type="hidden" class="product_quantity" value="1">
                                            @if ($product['productStock'] > 0)
                                            <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart "></i><span>ADD TO CART</span></a>  
                                            @endif
            
                                            
                                            
            
                                        </div>
            
                                        <!-- Content -->
                                        <div class="content">
            
                                            <!-- Category & Title -->
                                            <div class="category-title">
            
                                                <a href="" class="cat">{{$i['productCategory']}}</a>
                                                <h5 class="title"><a href="">{{ substr($product['productName'], 0, 40) }}{{ strlen($product['productName']) > 40 ? "..." : "" }}</a></h5>
            
                                            </div>
            
                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">
            
                                                @if ($discounted && $start_date <= now() && $end_date >= now())
                                                <h5 class="price"><span class="old" style="color: red">${{$product['productPrice']}} </span>${{$discountedPrice}}</h5>
                                                @else
                                                <h5 class="price">${{$product['productPrice']}}</h5>
                                                @endif
                                                <div class="ratting">
                                                    @if ($product['productStock'] > 0)
                                                    <span class="availability"><span style="color: green; font-weight: 700 ;">In Stock</span></span>
                                                    @elseif ($product['productStock'] == 0)
                                                    <span class="availability"> <span style="color: red;font-weight: 700 ;">Out of Stock</span></span>
                                                    @endif
                                                </div>
            
                                            </div>
            
                                        </div>
            
                                    </div><!-- Product End -->
                                </div>
                                @endforeach

                                    </div><!-- Product Slider End -->
                                </div><!-- Product Slider Wrap End -->

                            </div><!-- Tab Pane End -->

                            <!-- Tab Pane Start -->
                           

                        </div>
                    </div><!-- Product Tab Content End -->
                    
                </div>
            </div><!-- Product Tab Filter End-->
            
        </div>
    </div>
</div><!-- Best Deals Product Section End -->

<!-- New Arrival Product Section Start -->
<div class="product-section section mb-60">
    <div class="container">
        <div class="row">
            
            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="NEW ARRIVAL"><h1>NEW ARRIVAL</h1></div>
            </div><!-- Section Title End -->
            
            <div class="col-12">
                <div class="row">
                    @foreach ($arrivals as $productData)
                    @php
                    $arrival = $productData['product'];
                    $discountedPrice = $productData['discountedPrice'];
                    $discounted = $productData['discounted'];
                    $start_date = $productData['start_date'];
                    $end_date = $productData['end_date'];
                    @endphp
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                        <!-- Product Start -->
                        <div class="ee-product product">

                            <!-- Image -->
                            <div class="image">

                                <span class="label new">new</span>
                                

                                <a href="{{ route('single-product', ['id' => $arrival['id']]) }}" class="img"><img src="assets/images/uploads/{{$arrival['productImage']}}" alt="Product Image"></a>

                                <div class="wishlist-compare">
                                   
                                    <a href="" data-tooltip="Wishlist" class="addToWhishlistBtn"><i class="ti-heart"></i></a>
                                </div>
                                <input type="hidden" class="product_id" value="{{$arrival->id}}">
                                <input type="hidden" class="product_quantity" value="1">

                                @if ($arrival['productStock'] > 0)
                                <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart "></i><span>ADD TO CART</span></a>  
                                @endif

                            </div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="category-title">

                                    <a href="" class="cat">{{$arrival['productCategory']}}</a>
                                    <h5 class="title"><a href="single-product.html">{{ substr($arrival['productName'], 0, 40) }}{{ strlen($arrival['productName']) > 40 ? "..." : "" }}</a></h5>

                                </div>

                                <!-- Price & Ratting -->
                                <div class="price-ratting">
                                    @if ($discounted && $start_date <= now() && $end_date >= now())
                                    <h5 class="price"><span class="old" style="color: red">${{$arrival['productPrice']}} </span>${{$discountedPrice}}</h5>
                                    @else
                                    <h5 class="price">${{$arrival['productPrice']}}</h5>
                                    @endif
                                    <div class="ratting">
                                        @if ($arrival['productStock'] > 0)
                                        <span class="availability"><span style="color: green; font-weight: 700 ;">In Stock</span></span>
                                        @elseif ($arrival['productStock'] == 0)
                                        <span class="availability"> <span style="color: red;font-weight: 700 ;">Out of Stock</span></span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                        </div><!-- Product End -->
                    </div>
                    @endforeach

                 
                    
                </div>
            </div>
            
        </div>
    </div>
</div><!-- New Arrival Product Section End -->
<div id="login-modal4" class="modal">
    <div class="modal-content">
      <h2>Login to Continue</h2>
      <p>You must be logged in to add items to your busket.</p>
      <button class="btn" id="login-btn2">Login</button>
      <span class="close-btn2 ">&times;</span>
    </div>
</div> 
<script>
    $(document).ready(function(){
        const addToCartBtn = document.querySelector(".add-to-cart");
        const loginModal2 = document.getElementById("login-modal4");
        const loginBtn2 = document.getElementById("login-btn2");
        const closeBtn2 = document.querySelector(".close-btn2");
       
        
        $(".add-to-cart").on("click", function(event) {
          if (!isLoggedIn()) {
            loginModal2.style.display = "block";
            event.preventDefault();
          } else {
           
          }
        });
    
        loginBtn2.addEventListener("click", () => {
          loginModal2.style.display = "none";
          window.location.href = "http://127.0.0.1:8000/login";
        });
        

        closeBtn2.addEventListener("click", () => {
          loginModal2.style.display = "none";
        });
 
        window.addEventListener("click", (event) => {
          if (event.target == loginModal2 && loginModal2.style.display === "block") {
            loginModal2.style.display = "none";
          }
        });

        function isLoggedIn() {

          let loggedIn = false;
        
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
          $.ajax({
            type: "POST",
            url: "/check-login",
            async: false,
            success: function (response) {
              if (response.loggedIn) {
                loggedIn = true;
              }
            },
            error: function () {
              console.log("Error occurred while checking login status.");
            },
          });
        
          return loggedIn;
        }
        });
</script>

@endsection