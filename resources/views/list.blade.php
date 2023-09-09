@extends('theme')
@section('content')
<link rel="stylesheet" href="assets/css/modal.css">
<div class="product-section section ">
    <div class="">
        <div class="row">
           
            <div class="col-12">
                
                <div class="row ">
                    <div class="col">
                       
                        <!-- Shop Top Bar Start -->
                        <div class="shop-top-bar">

                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a  href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                <a  href="#" data-target="list"><i class="fa fa-list"></i></a>
                            </div>

                            <!-- Product Showing -->
                            <div class="product-showing">
                                <p>Showing</p>
                                <select name="sortby" class="nice-select" onchange="window.location.href=this.value">
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'show' => '4']) }}">4</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'show' => '6']) }}">6</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'show' => '8']) }}">8</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'show' => '10']) }}">10</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'show' => '12']) }}">12</option>
                                </select>
                            </div>

                            <!-- Product Short -->
                            <div class="product-short ">
                                <p>Sort by</p>
                                <select name="sortby" class="nice-select" onchange="window.location.href=this.value">
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'sort' => 'date']) }}">Newest items</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'sort' => 'name-desc']) }}">Name: Ascending</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'sort' => 'name-asc']) }}">Name: Descending</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'sort' => 'price-asc']) }}">Price: low to high</option>
                                    <option value="{{ route('list.getProduct', ['productCategory'=>request()->get('productCategory'),'sort' => 'price-desc']) }}">Price: high to low</option>

                                </select>
                            </div>
                            
                            
                          
                            
                            

                            <!-- Product Pages -->
                            <div class="product-pages">
                                <p>Pages {{$donnee->currentPage()}} of {{$donnee->lastPage()}}</p>
                            </div>

                        </div><!-- Shop Top Bar End -->
                        
                    </div>
                </div>
                
                <!-- Shop Product Wrap Start -->
                <!-- Shop Product Wrap Start -->
                
                <div class="shop-product-wrap product_data grid row">
                    @foreach ($products as $productData)
                    @php
                    $i = $productData['product'];
                    $discountedPrice = $productData['discountedPrice'];
                    $discounted = $productData['discounted'];
                    $start_date = $productData['start_date'];
                    $end_date = $productData['end_date'];
                    @endphp
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                       
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
                                    <div id="login-modal3" class="modal">
                                        <div class="modal-content">
                                          <h2>Login to Continue</h2>
                                          <p>You must be logged in to add items to your busket.</p>
                                          <button class="btn" id="login-btn2">Login</button>
                                          <span class="close-btn2 ">&times;</span>
                                        </div>
                                    </div> 
                                </div>

                                <input type="hidden" class="product_id" value="{{$i->id}}">
                                <input type="hidden" class="product_quantity" value="1">

                                
                                @if ($i['productStock'] > 0)
                                <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart update-cart"></i><span>ADD TO CART</span></a> 
                                <div id="login-modal2" class="modal">
                                    <div class="modal-content">
                                      <h2>Login to Continue</h2>
                                      <p>You must be logged in to add items to your busket.</p>
                                      <button class="btn" id="login-btn2">Login</button>
                                      <span class="close-btn2 ">&times;</span>
                                    </div>
                                </div> 
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
                        
                        <!-- Product List Start -->
                        <div class="ee-product-list">

                            <!-- Image -->
                            <div class="image">

                                <a href="{{ route('single-product', ['id' => $i['id']]) }}" class="img"><img src="assets/images/uploads/{{$i['productImage']}}" alt="Product Image"></a>

                            </div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="head-content">

                                    <div class="category-title">
                                        <a href="#" class="cat">{{$i['productCategory']}}</a>
                                        <h5 class="title"><a href="single-product.html">{{$i['productName']}}</a></h5>
                                    </div>
                                    
                                    
                                    

                                </div>
                                
                                <div class="left-content">
                                   
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    
                                    <div class="desc">
                                        <p>{{$i['productDescription']}}</p>
                                    </div>
                                    
                                    <div class="actions">

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart addToCartBtn"></i><span>ADD TO CART</span></a>

                                        <div class="wishlist-compare">
                                            <a href="" data-tooltip="Wishlist" class="addToWhishlistBtn"><i class="ti-heart"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="right-content">
                                    <div class="">
                                        @if ($discounted== true)
                                        <h1 style="font-weight: bold">${{$discountedPrice}}</h1>
                                        @elseif ($discounted == false)
                                        <h1 style="font-weight: bold">${{$i['productPrice']}}</h1>
                                        @endif
                                        
                                    </div>
                                    @if ($i['productStock'] > 0)
                                    <span class="availability">Availability: <span style="color: green">In Stock</span></span>
                                    @elseif ($i['productStock'] == 0)
                                    <span class="availability">Availability: <span style="color: red">Out of Stock</span></span>
                                    @endif
                                </div>
                            </div>
                        </div><!-- Product List End -->
                        
                        
                    </div>
                    @endforeach
                    
                    
                </div><!-- Shop Product Wrap End -->
                
                
                <div class="col">
                    <ul class="pagination">
                      @if($donnee->currentPage() > 1)
                        <li><a href="{{ $donnee->previousPageUrl() }}&productCategory={{ request('productCategory') }}&sort={{ request('sort') }}"><i class="fa fa-angle-left"></i> Back</a></li>
                      @endif
                  
                      @for($i = 1; $i <= $donnee->lastPage(); $i++)
                        @if($i == $donnee->currentPage())
                          <li class="active"><a href="#">{{ $i }}</a></li>
                        @else
                          <li><a href="{{ $donnee->url($i) }}&productCategory={{ request('productCategory') }}&sort={{ request('sort') }}">{{ $i }}</a></li>
                        @endif
                      @endfor
                  
                      @if($donnee->currentPage() < $donnee->lastPage())
                        <li><a href="{{ $donnee->nextPageUrl() }}&productCategory={{ request('productCategory') }}&sort={{ request('sort') }}">Next <i class="fa fa-angle-right"></i></a></li>
                      @endif
                    </ul>
                  </div>
            
            
        </div>
    </div>
</div><!-- Feature Product Section End -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
        const addToCartBtn = document.querySelector(".add-to-cart");
        const loginModal2 = document.getElementById("login-modal2");
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

