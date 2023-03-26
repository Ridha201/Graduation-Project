@extends('theme')
@section('content')

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
                    @foreach ($donnee as $i)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                       
                        <!-- Product Start -->
                        
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

                                    <a href="" class="cat">{{$i['productCategory']}}</a>
                                    <h5 class="title"><a href="">{{ substr($i['productName'], 0, 40) }}{{ strlen($i['productName']) > 40 ? "..." : "" }}</a></h5>

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
                        
                        <!-- Product List Start -->
                        <div class="ee-product-list">

                            <!-- Image -->
                            <div class="image">

                                <a href="" class="img"><img src="assets/images/uploads/{{$i['productImage']}}" alt="Product Image"></a>

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
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="right-content">
                                    <div class="">
                                        <h1 style="font-weight: bold">${{$i['productPrice']}}</h1>
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
<script src="assets/js/bootstrap.min.js"></script>
