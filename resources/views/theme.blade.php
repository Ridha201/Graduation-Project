<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/ee/ee/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Feb 2023 19:15:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E&E - Electronics eCommerce Bootstrap5 HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logohome.png">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icon-font.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Header Section Start -->
<div class="header-section section" style="background-image: url('assets/images/')">

    <!-- Header Top Start -->
    <div class="header-top header-top-one header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col mt-10 mb-10">
                    <a href="/">
                        <img src="assets/images/logohome.png" alt="logo">
                    </a>
                </div><!-- Logo End -->

                <div class="col mt-10 mb-10">
                    <!-- Header Links Start -->
                    <div class="header-links">
                        <a href="track"><img src="assets/images/icons/car.png" alt="Car Icon"> <span>Track your order</span></a>
                   
                    </div><!-- Header Links End -->
                </div>

                <div class="col order-5  order-lg-2 mt-10 mb-10">
                    <!-- Header Advance Search Start -->
                    <div class="header-advance-search">
                        
                        <form action="#">
                            <div class="input"><input type="text" placeholder="Search your product"></div>
                            <div class="select">
                                <select class="nice-select">
                                    <option>All Categories</option>
                                    <option>GAMING PC</option>
                                    <option>CONSOLS</option>
                                    <option>GAMING ACCESORIES </option>
                                    <option>PC COMPONENTS</option>
                                </select>
                            </div>
                            <div class="submit"><button><i class="icofont icofont-search-alt-1"></i></button></div>
                        </form>
                        
                        
                    </div><!-- Header Advance Search End -->
                </div>
                <div class="col order-lg-2">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">
                        <a href="wishlist.html" class="header-wishlist"><i class="ti-heart"></i> <span class="number">3</span></a>
                        <!-- Cart -->
                        <a href="cart" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number cart-count">0</span></a>
                    </div><!-- Header Shop Links End -->
                </div>

                <div class="col order-2 order-lg-12 mt-10 mb-10">
                    <!-- Header Account Links Start -->
                    
                    
                    <div class="header-account-links">
                        <a href="register"><i class="icofont icofont-user-alt-7"></i> <span>Register</span></a>
                        <a href="login"><i class="icofont icofont-login d-none"></i> <span>Login</span></a>
                    </div><!-- Header Account Links End -->
                    
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->


    <div class="header-category-section main-menu">
        <div class="container ">
            <div class="row">
                <div class="col">
                    
                    <!-- Header Category -->
                    <div class="header-category">
                        
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap d-block d-lg-none">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>
                        
                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <li class="menu-item-has-children"><a href="l">gaming pc</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'pc']) }}">gaming pc</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'laptop']) }}">gaming laptop</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'monitor']) }}">gaming monitor</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="">consoles</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'controller']) }}">controllers</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'game']) }}">games</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'playstation']) }}">playstations</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'xbox']) }}">Xbox</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'nintendo']) }}">nintendo</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="">gaming accessories </a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'mouse']) }}">gaming mouses</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'mousepad']) }}">mousepads</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'keyboard']) }}">gaming keyboards</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'headset']) }}">gaming headsets</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'streaming']) }}">streaming equipments</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="">pc components</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'CPU']) }}">processors</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'GPU']) }}">Graphic cards</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'motherboard']) }}">motherboards</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'RAM']) }}">memory</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'storage']) }}">storage</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'case']) }}">cases</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'cooler']) }}">coolers</a></li>
                                        <li><a href="{{ route('list.getProduct', ['productCategory' => 'PSU']) }}">power supply</a></li>
                                    </ul>
                                </li>
                                <li><a href="builder">pc builder</a></li>
                                <li><a href="contact">contact</a></li>
                                
                            </ul>
                        </nav>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- Header Category End -->

</div><!-- Header Section End -->





<div class="container">
    @yield('content')
</div>

<!-- Brands Section Start -->
<div class="brands-section section mb-90">
    <div class="container">
        <div class="row">
            
            <!-- Brand Slider Start -->
            <div class="brand-slider col">
                <div class="brand-item col"><img src="assets/images/brands/logitech.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/msi-gaming-series-logo-B0013CFA90-seeklogo.com.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/Intel-Logo-2005.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/Ryzen-RYZEN-Logo.wine.png" alt="Brands"></div>
                <div class="brand-item col"><img src="assets/images/brands/01-nvidia-logo-vert-500x200-2c50-d@2x.png" alt="Brands"></div>
            </div><!-- Brand Slider End -->
            
        </div>
    </div>
</div><!-- Brands Section End -->

<!-- Subscribe Section Start -->
<div class="subscribe-section section bg-gray pt-55 pb-55">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Mailchimp Subscribe Content Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                <div class="subscribe-content">
                    <h2>SUBSCRIBE <span>OUR NEWSLETTER</span></h2>
                    <h2><span>TO GET LATEST</span> PRODUCT UPDATE</h2>
                </div>
            </div><!-- Mailchimp Subscribe Content End -->
            
            
            <!-- Mailchimp Subscribe Form Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                
				<form id="mc-form" class="mc-form subscribe-form" >
					<input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
					<button id="mc-submit">subscribe</button>
				</form>
				<!-- mailchimp-alerts Start -->
				<div class="mailchimp-alerts text-centre">
					<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
					<div class="mailchimp-success"></div><!-- mailchimp-success end -->
					<div class="mailchimp-error"></div><!-- mailchimp-error end -->
				</div><!-- mailchimp-alerts end -->
                
            </div><!-- Mailchimp Subscribe Form End -->
            
        </div>
    </div>
</div><!-- Subscribe Section End -->

<!-- Footer Section Start -->
<div class="footer-section section bg-ivory">
   
    <!-- Footer Top Section Start -->
    <div class="footer-top-section section pt-90 pb-50">
        <div class="container">
           
            <!-- Footer Widget Start -->
            <div class="row">
                <div class="col mb-90">
                    <div class="footer-widget text-center">
                        <div class="footer-logo">
                            <img src="assets/images/logo.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                            <img class="theme-dark" src="assets/images/logo-light.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </div>
                        <p>Electronics product actual teachings of  he great explorer of the truth, the malder of human happiness. No one rejects</p>
                    </div>
                </div>
            </div><!-- Footer Widget End -->
            
            <div class="row">
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">CONTACT INFO</h4>
                        
                        <p class="contact-info">
                            <span>Address</span>
                            You address will be here <br>
                             Lorem Ipsum text                        </p>
                        
                        <p class="contact-info">
                            <span>Phone</span>
                            <a href="tel:01234567890">01234 567 890</a>
                            <a href="tel:01234567891">01234 567 891</a>
                        </p>
                        
                        <p class="contact-info">
                            <span>Web</span>
                            <a href="mailto:info@example.com">info@example.com</a>
                            <a href="#">www.example.com</a>
                        </p>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">CUSTOMER CARE</h4>
                        
                        <ul class="link-widget">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">INFORMATION</h4>
                        
                        <ul class="link-widget">
                            <li><a href="#">Track your order</a></li>
                            <li><a href="#">Locate Store</a></li>
                            <li><a href="#">Online Support</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Payment</a></li>
                            <li><a href="#">Shipping & Returns</a></li>
                            <li><a href="#">Gift coupon</a></li>
                            <li><a href="#">Special coupon</a></li>
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">LATEST NEWS</h4>
                        
                        <div class="footer-news">
                            <div class="sidebar-blog p-0 mb-4 border-0">
                                <a href="#" class="image"><img class="opacity-100" src="assets/images/blog/sidebar-blog-1.jpg" alt="Sidebar Blog"></a>
                                <div class="content">
                                    <h5><a href="#">PS4 Play Station for playing games</a></h5>
                                    <span>30 January 2022</span>
                                </div>
                            </div>
                            <div class="sidebar-blog p-0 mb-4 border-0">
                                <a href="#" class="image"><img class="opacity-100" src="assets/images/blog/sidebar-blog-2.jpg" alt="Sidebar Blog"></a>
                                <div class="content">
                                    <h5><a href="#">Kitchen Appliances Toster</a></h5>
                                    <span>26 January 2022</span>
                                </div>
                            </div>
                            <div class="sidebar-blog p-0 mb-0 border-0">
                                <a href="#" class="image"><img class="opacity-100" src="assets/images/blog/sidebar-blog-3.jpg" alt="Sidebar Blog"></a>
                                <div class="content">
                                    <h5><a href="#">Most Innovative Smartphone</a></h5>
                                    <span>20 January 2022</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
            </div>
            
        </div>
    </div><!-- Footer Bottom Section Start -->
   
    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">
                
                <!-- Footer Copyright -->
                <div class="col-lg-6 col-12">
                    <div class="footer-copyright"><p>&copy; Copyright, All Rights Reserved by <a href="#">E&E</a></p></div>
                </div>
                
                <!-- Footer Payment Support -->
                <div class="col-lg-6 col-12">
                    <div class="footer-payments-image"><img src="assets/images/payment-support.png" alt="Payment Support Image"></div>
                </div>
                
            </div>
        </div>
    </div><!-- Footer Bottom Section Start -->
    
</div><!-- Footer Section End -->


    

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js'"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js'"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from htmldemo.net/ee/ee/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Feb 2023 19:15:39 GMT -->
</html>