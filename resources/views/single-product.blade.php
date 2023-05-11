
@extends('theme')
@section('content')
<link rel="stylesheet" href="assets/css/modal.css">

<div class="product-section section mt-90 mb-90">
    <div class="container ">
        
        <div class="row mb-90 product">
                    
            <div class="col-lg-6 col-12 mb-50">

                <!-- Image -->
                <div class="single-product-image thumb-right">

                    <div class="tab-content">
                        <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                            <div class="big-image"><img class =""src="assets/images/uploads/{{$product->productImage}}"alt="Big Image"><a href="assets/images/uploads/{{$product->productImage}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                        </div>
                        <div id="single-image-2" class="tab-pane fade big-image-slider">
                            <div class="big-image"><img src="assets/images/uploads/{{$product['productImage2']}}" alt="Big Image"><a href="assets/images/uploads/{{$product['productImage2']}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            
                        </div>
                        <div id="single-image-3" class="tab-pane fade big-image-slider">
                            <div class="big-image"><img src="assets/images/uploads/{{$product->productImage3}}" alt="Big Image"><a href="assets/images/uploads/{{$product->productImage3}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            
                        </div>
                    </div>
                    
                    <div class="thumb-image-slider nav" data-vertical="true">
                        <a class="thumb-image active" data-bs-toggle="tab" href="#single-image-1"><img src="assets/images/uploads/{{$product->productImage}}" alt="Thumbnail Image"></a>
                        <a class="thumb-image" data-bs-toggle="tab" href="#single-image-2"><img src="assets/images/uploads/{{$product->productImage2}}" alt="Thumbnail Image"></a>
                        <a class="thumb-image" data-bs-toggle="tab" href="#single-image-3"><img src="assets/images/uploads/{{$product->productImage3}}" alt="Thumbnail Image"></a>
                    </div>

                </div>

            </div>
                    
            <div class="col-lg-6 col-12 mb-50">

                <!-- Content -->
                <div class="single-product-content">

                    <!-- Category & Title -->
                    <div class="head-content">

                        <div class="category-title">
                            <a href="#" class="cat">{{$product->productCategory}}</a>
                            <h5 class="title" >{{$product->productName}}</h5>
                        </div>

                        <h5 class="price " value="{{$product->productPrice}}">${{$product->productPrice}}</h5>

                    </div>

                    <div class="single-product-description">

                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <div class="desc">
                            <p>{{$product->productDescription}} </p>
                        </div>
                        
                        
                        <div class="quantity-colors">
                            
                            <div class="quantity">
                                <h5>Quantity</h5>
                                <div class="pro-qty "><input type="text" class="product_quantity" value="1"></div>
                                <input type="hidden" class="product_stock" value="{{$product->productStock}}">
                            </div>        
                                @if ($product->productStock >=10)   
                                <span class="availability">Availability: <span style="color: green ">In Stock</span></span>                 
                                @elseif ($product->productStock > 0 && $product->productStock < 10)
                                <span class="availability">Availability: <span style="color: rgb(255, 145, 0) ">Only {{$product->productStock}} left in stock</span></span>
                                @elseif ($product->productStock == 0)
                                <span class="availability">Availability: <span style="color: red">Out of Stock</span></span>
                                @endif
                                                   
                            
                        </div> 

                        <div class="actions">
                            <input type="hidden" class="product_id" value="{{$product->id}}">
                            <input type="hidden" class="product_price" value="{{$product->productPrice}}">
                            <input type="hidden" class="product_name" value="{{$product->productName}}">
                            <input type="hidden" class="product_image" value="{{$product->productImage}}">
                            @if ($product->productStock > 0)
                            <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart "></i><span >ADD TO CART</span></a>
                            <div id="login-modal2" class="modal">
                                <div class="modal-content">
                                  <h2>Login to Continue</h2>
                                  <p>You must be logged in to add items to your busket.</p>
                                  <button class="btn" id="login-btn2">Login</button>
                                  <span class="close-btn2 ">&times;</span>
                                </div>
                              </div>
                            <div class="wishlist-compare">
                                <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                            </div>
                            @else
                            <h5 class="title" style="font-weight: 600;"> Email when product back in stock</h5>
                            <div style="display: flex; align-items: center;" class="ee-login">
                                <input type="text" id="email" placeholder="Type your email address" class="form-control" name="email" autocomplete="email" autofocus="" style="width: 300px;">
                                <input type="submit" class="stockbtn" value="SUBMIT">
                            </div>
                            @endif

                        </div>
                        
                        <div class="tags">
                            
                            <img src="assets/images/del.png" alt="Car Icon" width="35" height="25">
                            <span style="font-weight: 600;">  2-4 working days </span>
                            
                        </div>
                        
                        
                        <?php
                            $currentDate = date('Y-m-d');
                            $nextDate = date('Y-m-d', strtotime($currentDate . ' +3 day'));
                         ?>
                         <div class="tags" style="    margin-top: -20px;">
                            <img src="assets/images/orderreceived.png" alt="Car Icon" width="35" height="32">
                            <span style="font-weight: 600;" > Order now and get it by <b>{{$nextDate}} </b></span>
                         </div>
                     
                               
                               
                              
                           
                       
                          

                    </div>

                </div>

            </div>
            
        </div>
        
        <div class="row">
            
            <div class="col-lg-10 col-12 ml-auto mr-auto">
                
                <ul class="single-product-tab-list nav">
                    <li><a href="#product-description" class="active" data-bs-toggle="tab" >description</a></li>
                    <li><a href="#product-specifications" data-bs-toggle="tab" >specifications</a></li>
                    <li><a href="#product-reviews" data-bs-toggle="tab" >reviews</a></li>
                </ul>
                
                <div class="single-product-tab-content tab-content">
                    <div class="tab-pane fade show active" id="product-description">
                        
                        <div class="row">
                            <div class="single-product-description-content col-lg-8 col-12">
                                <h4>Introducing Flex 3310</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora in</p>
                                <h4>Stylish Design</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                <h4>Digital Camera, FM Radio & many more...</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                            </div>
                           
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="product-specifications">
                        <div class="single-product-specification">
                            <ul>
                                <li>Full HD Camcorder</li>
                                <li>Dual Video Recording</li>
                                <li>X type battery operation</li>
                                <li>Full HD Camcorder</li>
                                <li>Dual Video Recording</li>
                                <li>X type battery operation</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-reviews">
                       
                        <div class="product-ratting-wrap">
							<div class="pro-avg-ratting">
								<h4 class="avg"> <span></span></h4>
								<span id="total-review"></span>
							</div>
							<div class="ratting-list">
								<div class="sin-list float-start">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<span id="total1"></span>
								</div>
								<div class="sin-list float-start">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<span id="total2"></span>
								</div>
								<div class="sin-list float-start">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<span id="total3"></span>
								</div>
								<div class="sin-list float-start">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<span id="total4"></span>
								</div>
								<div class="sin-list float-start">
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<span id="total5"></span>
								</div>
							</div>
							<div class="rattings-wrapper">
                                @foreach($reviews as $review)
							
								<div class="sin-rattings">
									<div class="ratting-author">
										<h3>{{$review->name}}</h3>
                                        @if ($review->star == 5)
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        @elseif ($review->star == 4)
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        @elseif ($review->star == 3)
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        @elseif ($review->star == 2)
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        @elseif ($review->star== 1)
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        @endif
                                        

									</div>
									<p>{{$review->review}}</p>
								</div>
                                @endforeach
								
							
								
							</div>
							<div class="ratting-form-wrapper fix singel-product">
								<h3>Add your Comments</h3>
								<form action="{{url('/add-rating')}}" method="POST">
                                    @csrf
                                    
                                        <h5>Rating:</h5>
                                        <input type="hidden" class ="product_id" name="product_id" value="{{$product->id}}">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        
                                    </div>
								    <div class="ratting-form row">
										
										<div class="col-md-6 col-12 mb-15">
                                            <label for="name">Name:</label>
                                            <input id="reviewnName" placeholder="Name" type="text" name="name">
                                            <span id="nameError" class="text-danger"></span>
										</div>
										<div class="col-md-6 col-12 mb-15">
                                            <label for="email">Email:</label>
                                            <input id="reviewEmail" placeholder="Email" type="text" name="email">
                                            <span id="emailError" class="text-danger"></span>
										</div>
										<div class="col-12 mb-15">
											<label for="your-review">Your Review:</label>
											<textarea   id="your-review" placeholder="Write a review" name="review"></textarea>
                                            <span id="reviewError" class="text-danger"></span>
										</div>
										<div class="col-12">
											<input id="review-btn"value="add review" type="submit">
                                            <div id="login-modal" class="modal">
                                                <div class="modal-content">
                                                  <h2>Login to Continue</h2>
                                                  <p>You must be logged in to write a review.</p>
                                                  <button class="btn" id="login-btn">Login</button>
                                                  <span class="close-btn">&times;</span>
                                                </div>
                                              </div>
										</div>
								    </div>
								</form>
							</div>
						</div>
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
</div><!-- Single Product Section End -->

<!-- Related Product Section Start -->
<div class="product-section section mb-70">
    <div class="container">
        <div class="row">
            
            <!-- Section Title Start -->
            <div class="col-12 mb-40">
                <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
            </div><!-- Section Title End -->
            
            <!-- Product Tab Content Start -->
            <div class="col-12">
                        
                <!-- Product Slider Wrap Start -->
                <div class="product-slider-wrap product-slider-arrow-one">
                    <!-- Product Slider Start -->
                    <div class="product-slider product-slider-4">
                        @foreach ($relatedproducts as $i)

                        <div class="col pb-20 pt-10">
                            <div class="ee-product">

                            <!-- Image -->
                            <div class="image product" >
                                

                                <a href="{{ route('single-product', ['id' => $i['id']]) }}" class="img"><img src="assets/images/uploads/{{$i['productImage']}}" alt="Product Image"></a>

                                <div class="wishlist-compare">
                                    <a href="" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                    <a href="" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                </div>

                                <input type="hidden" class="product_id" value="{{$i->id}}">
                                <input type="hidden" class="product_quantity" value="1">

                                
                                <a href="#" class="add-to-cart addToCartBtn"><i class="ti-shopping-cart "></i><span>ADD TO CART</span></a>

                            </div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="category-title">

                                    <a href="{{ route('single-product', ['id' => $i['id']]) }}" class="cat">{{$i['productCategory']}}</a>
                                    <h5 class="title"><a href="{{ route('single-product', ['id' => $i['id']]) }}">{{ substr($i['productName'], 0, 40) }}{{ strlen($i['productName']) > 40 ? "..." : "" }}</a></h5>

                                </div>

                                <!-- Price & Ratting -->
                                <div class="price-ratting">

                                    <h5 class="price">${{$i['productPrice']}}</h5>
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
                        
            </div><!-- Product Tab Content End -->
            
        </div>
    </div>
</div><!-- Related Product Section End -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modal.js"></script>
@endsection
@section('scripts')
<script>

</script>

            


@endsection

