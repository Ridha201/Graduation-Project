(function ($) {
    "use strict";
    
/*--
    Menu Sticky
-----------------------------------*/
var windows = $(window);
var screenSize = windows.width();
var sticky = $('.header-sticky');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('is-sticky');
    }else{
        sticky.addClass('is-sticky');
    }
});

/*--
    Mobile Menu
------------------------*/
var mainMenuNav = $('.main-menu nav');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});

/*--
    Category Menu
------------------------*/
    
/*-- Variables --*/
var categoryToggleWrap = $('.category-toggle-wrap');
var categoryToggle = $('.category-toggle');
var categoryMenu = $('.category-menu');

/*
*  Category Menu Default Close for Mobile & Tablet Device
*  And Open for Desktop Device and Above
*/
function categoryMenuToggle() {
    var screenSize = windows.width();
    if ( screenSize <= 991) {
        categoryMenu.slideUp();
    } else {
        categoryMenu.slideDown();
    }
}

/*-- Category Menu Toggles --*/
function categorySubMenuToggle() {
    var screenSize = windows.width();
    if ( screenSize <= 991) {
        $('.category-menu .menu-item-has-children > a').prepend('<i class="expand menu-expand"></i>');
        $('.category-menu .menu-item-has-children ul').slideUp();
//        $('.category-menu .menu-item-has-children i').on('click', function(e){
//            e.preventDefault();
//            $(this).toggleClass('expand');
//            $(this).siblings('ul').css('transition', 'none').slideToggle();
//        })
    } else {
        $('.category-menu .menu-item-has-children > a i').remove();
        $('.category-menu .menu-item-has-children ul').slideDown();
    }
}
categoryMenuToggle();
windows.resize(categoryMenuToggle);
categorySubMenuToggle();
windows.resize(categorySubMenuToggle);

categoryToggle.on('click', function(){
    categoryMenu.slideToggle();
});
    
/*-- Category Sub Menu --*/
$('.category-menu').on('click', 'li a, li a .menu-expand', function(e) {
    var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
    if ($a.parent().hasClass('menu-item-has-children')) {
        if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
            if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
            else {
                $(this).parents('li').siblings('li').find('ul:visible').slideUp();
                $a.siblings('ul').slideDown();
            }
        }
    }
    if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
        e.preventDefault();
        return false;
    }
});

/*-- Sidebar Category --*/
var categoryChildren = $('.sidebar-category li .children');
    
    categoryChildren.slideUp();
    categoryChildren.parents('li').addClass('has-children');
    
$('.sidebar-category').on('click', 'li.has-children > a', function(e) {
    
    if ($(this).parent().hasClass('has-children')) {
        if ($(this).siblings('ul:visible').length > 0) $(this).siblings('ul').slideUp();
        else {
            $(this).parents('li').siblings('li').find('ul:visible').slideUp();
            $(this).siblings('ul').slideDown();
        }
    }
    if ($(this).attr('href') === '#') {
        e.preventDefault();
        return false;
    }
});

/*--
    Header Search
------------------------*/
var searchToggle = $('.search-toggle');
var searchContainer = $('.header-search-container');

searchToggle.on('click', function(){
    
    if( !$(this).hasClass('active') ) {
        $(this).addClass('active').find('i').removeClass('icofont-search-alt-1').addClass('icofont-close');
        searchContainer.slideDown();
    } else {
        $(this).removeClass('active').find('i').removeClass('icofont-close').addClass('icofont-search-alt-1');
        searchContainer.slideUp();
    }
    
});
/*--
    Header Cart
------------------------*/

    
/*--
    Hero Slider
--------------------------------------------*/
var heroSlider = $('.hero-slider');
heroSlider.slick({
    arrows: true,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
});
    
/*--
	Product Slider
-----------------------------------*/
$('.product-slider-4').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
$('.product-slider-4-full').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1499,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
$('.product-slider-3').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 3,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
/*-- Single Product Big Image Slider --*/
$('.big-image-slider').slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
});
    
/*----- 
	Team Slider
--------------------------------*/
$('.team-slider-5').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 5,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 479,
            settings: {
                autoplay: true,
                slidesToShow: 1,
            }
        }
    ]
});
    
/*----- 
	Testimonial Slider
--------------------------------*/
$('.testimonial-slider').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

$('.testimonial-slider-2').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 2,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
            }
        }
    ]
});
    
/*-- Image Slider For Sync with Content Slider --*/
$('.testimonial-image-slider').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    asNavFor: '.testimonial-content-slider',
    slidesToShow: 3,
    centerMode: true,
    centerPadding: '0',
    focusOnSelect: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

/*-- Content Slider For Sync with Image Slider --*/
$('.testimonial-content-slider').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 1,
    asNavFor: '.testimonial-image-slider',
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

/*--
	Brand Slider
-----------------------------------*/
$('.brand-slider').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: false,
    slidesToShow: 5,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-rounded-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-rounded-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});
    
/*--
    Product View Mode
------------------------*/
$('.product-view-mode a').on('click', function(e){
    e.preventDefault();
    var shopProductWrap = $('.shop-product-wrap');
    var viewMode = $(this).data('target');
    $('.product-view-mode a').removeClass('active');
    $(this).addClass('active');
    shopProductWrap.removeClass('grid list').addClass(viewMode);
    localStorage.setItem('viewMode', viewMode);
});


var viewMode = localStorage.getItem('viewMode');
if (viewMode) {
    $('.product-view-mode a[data-target="' + viewMode + '"]').addClass('active');
    $('.shop-product-wrap').removeClass('grid list').addClass(viewMode);
}
$(document).ready(function() {
    const stockBtn = $(".stockbtn");
    const stockBtnModal = $("#stockbtn-modal");
    const closeBtn2 = $(".close-btn2");
    const emailInput = $(".email-notify-input");
  
 
    stockBtn.on("click", function() {
      if (emailInput.val().trim() !== "") {
        stockBtnModal.css("display", "block");
      }
    });
  
    closeBtn2.on("click", function() {
      stockBtnModal.css("display", "none");
    });
  
    $(window).on("click", function(event) {
      if (event.target === stockBtnModal[0]) {
        stockBtnModal.css("display", "none");
      }
    });
  });



$(document).ready(function(){ 

    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product').find('.product_id').val();
        var product_quantity = $(this).closest('.product').find('.product_quantity').val();
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/add-to-cart",
            data : {
                'product_id' : product_id,
                'product_quantity' : product_quantity,
            },
            success : function(response){
               
                loadCart();
                $('.cart-count').html(response.count); 
            }
        });
    });

    function loadCart(){
        $.ajax({
            method : "GET",
            url : "/load-cart-data",
            success : function(response){
                $('.cart-count').html(response.count);
            }
        });
    }

    loadCart();
});
$(document).ready(function(){
    $('.ti-shopping-cart, .checkout-btn').click(function(e){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/validate-cart",
            success : function(response){
                
            },
             
        });
    });
});

$(document).ready(function(){
    $('.addToWhishlistBtn').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.product').find('.product_id').val();
       

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/add-to-wishlist",
            data : {
                'product_id' : product_id,
                
            },
            success : function(response){
               
                loadWishlist();
                $('.wishlist-count').html(response.count); 
            }
        });
    });

    function loadWishlist(){
        $.ajax({
            method : "GET",
            url : "/load-wishlist-data",
            success : function(response){
                $('.wishlist-count').html(response.count);
            }
        });
    }
    loadWishlist();
});



$(document).ready(function(){
function review () {

    
    var product_id = $('.product_id').val();
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        method : "GET",
        url : "/total-review",
        data : {
            'product_id' : product_id,
        },
        success : function(response){
            $('#total1').text('('+response.total1 +')');
            $('#total2').text('('+response.total2 +')');
            $('#total3').text('('+response.total3 +')');
            $('#total4').text('('+response.total4 +')');
            $('#total5').text('('+response.total5 +')');
            $('.avg').text(response.avg + ' (Overall)');
            $('#total-review').text('Based on '+response.total +' Comments');

            
        }
    });
}
review();
});









$(document).ready(function(){

    $('#review-btn').click(function(e){
        var name = $('#reviewnName').val();
        var email = $('#reviewEmail').val();
        var review = $('#your-review').val();

        var name_error = '';
        var email_error = '';
        var review_error = '';

        if (!name) {
           name_error = "Name is required";
        }
        if (!email) {
        email_error = "Email is required";
        }
        if (!review) {
        review_error = "Review is required";
        }

       if (name_error || email_error || review_error) {
                $('#nameError').html(name_error);
                $('#emailError').html(email_error);
                $('#reviewError').html(review_error);
                return false;
       }

    });
});






/*--
    Product Tab Filter Select Style For Mobile
--------------------------------------------*/
function productTabFilterInit() {
    var productTabFilter = $('.product-tab-filter');
    
    productTabFilter.each(function(){
        var filterToggle = $(this).find('.product-tab-filter-toggle');
        var filterToggleCatElement = $(this).find('.product-tab-filter-toggle span');
        var filterList = $(this).find('.product-tab-list');
        var filterListItem = $(this).find('.product-tab-list li a');
        
        var filterCatText =  filterList.find('.active').text();
        
        filterToggleCatElement.text(filterCatText);
        
        /*-- Open Filter Tab List --*/
        filterToggle.on('click', function(){
            $(this).siblings('.product-tab-list').slideToggle();
        });
        
        /*-- Close Filter Tab List On Select a Category --*/
        filterListItem.on('click', function(){
            var screenSize = windows.width();
            var filterCatText= $(this).text();
            filterToggleCatElement.text(filterCatText);
            
            if ( screenSize < 767) {
                filterList.slideToggle();
            }
            
        });
        
    });
    
}
productTabFilterInit();
    
/*-- Product Tab Filter Show Hide For Mobile & Desktop --*/
function productTabFilterScreen() {
    var screenSize = windows.width();
    var filterList = $('.product-tab-list');
    
    if ( screenSize < 767) {
        filterList.slideUp();
    } else {
        filterList.slideDown();
    }
}
productTabFilterScreen();
windows.resize(productTabFilterScreen);
    
/*--
	Add To Cart Animation
------------------------*/
$('.add-to-cart').on('click', function(e){
    e.preventDefault();
    
    var button = $(this); 
    
    if(button.hasClass('added')){
        button.removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart'); 
    } else{
        button.addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added'); 
    }
    
    setTimeout(function(){
        button.removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart'); 
    }, 800); 
});




/*--
	Wishlist & Compare
------------------------*/
$('.wishlist-compare a').on('click', function(e){
    e.preventDefault();
    
    if($(this).hasClass('added')){
       $(this).removeClass('added');
    } else{
        $(this).addClass('added');
    }
});

/*--
	Count Down Timer
------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Second</p></span>'));
	});
});

/*--
	CLose Popup
-----------------------------------*/
$('.close-popup').on('click', function(){
    $('[data-modal="popup-modal"]').fadeOut('slow');
});

/*--
	Video Popup
-----------------------------------*/
var videoPopup = $('.video-popup');
videoPopup.magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});
    
/*--
	Image Popup
-----------------------------------*/
var imagePopup = $('.image-popup, .big-image-popup');
imagePopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
});
    
/*--
	Gallery Popup
-----------------------------------*/
var galleryPopup = $('.gallery-popup');
galleryPopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
    gallery: {
        enabled: true,
    },
});

/*--
	Counter UP
-----------------------------------*/
var counter = $('.counter');
counter.counterUp({
    delay: 20,
    time: 3000
});
    
/*--
	MailChimp
-----------------------------------*/
$('#mc-form').ajaxChimp({
	language: 'en',
	callback: mailChimpResponse,
	// ADD YOUR MAILCHIMP URL BELOW HERE!
	url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {
	
	if (resp.result === 'success') {
		$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
		$('.mailchimp-error').fadeOut(400);
		
	} else if(resp.result === 'error') {
		$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
	}  
}

/*--
	Twitter Feed
-----------------------------------*/
$('.footer-tweet').twittie({
    template: '<span class="author">{{screen_name}}</span>, {{tweet}}',
    count: 2,
    apiPath: 'assets/api/tweet.php',
});

/*--
    Scroll Up
-----------------------------------*/
$.scrollUp({
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade',
    scrollText: '<i class="icofont icofont-swoosh-up"></i>',
});
    
/*--
    Nice Select
------------------------*/
$('.nice-select').niceSelect()
    
/*--
	Price Range Slider
------------------------*/
$('#price-range').slider({
   range: true,
   min: 0,
   max: 2000,
   values: [ 25, 970 ],
   slide: function( event, ui ) {
	$('#price-amount').val( '$' + ui.values[ 0 ] + ' TO $' + ui.values[ 1 ] );
   }
  });
$('#price-amount').val( '$' + $('#price-range').slider( 'values', 0 ) +
   ' TO $' + $('#price-range').slider('values', 1 ) ); 
    
/*----- 
	Quantity
--------------------------------*/
$(document).ready(function() {
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').append('<span class="inc qtybtn">+</span>');
    $('.qtybtn').on('click', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        var maxValue = $(this).closest('.quantity-colors').find('.product_stock').val();

        if (maxValue == null){
            var $productContainer = $button.closest('tr[data-product-container]');
            var maxValue = $productContainer.find('.product_stock').val();
        } 
        

        if ($button.hasClass('inc')) {
            if (oldValue < maxValue) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                var newVal = maxValue;
            }
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);

    });  
});








$(document).ready(function() {
    
    $(".close-btn").click(function() {
      $("#myModal").hide();
      
    });
    function cpuReset() {
    $('#reset-compatibility-btn').click(function() {
       
        $('#empty-cpu').empty();
        var deffault = '<div class="component-info"><img id="add-component-img" src="assets/images/cpu.png" width="100" height="100"><span class="smallname" id="add-component-name"></span><span id="add-component-id"></span><span class="price" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></span><span class="price" id="add-component-price-input"></span></div>';
        $('#empty-cpu').append(deffault);
       
        var buttonHTML = '<button class="btn" id="add-cpu-btn" style="background-color: #e59053"><b>Add</b></button>';
        $('#parent-element-id').append(buttonHTML);
        $(document).off('click', '#add-cpu-btn');
        $(document).one('click', function() {
          getCPU();
        });
        
       
       
        
        $('#reset-compatibility-btn').remove();
       
        calculateEstimatedWattage();
        calculateBuildPrice();
        
      });
    }
   function mbdReset() {
      $('#reset-mbd-compatibility-btn').click(function() {
        $('#empty-mbd').empty();
        var deffault = '<div class="component-info"><span><img id="add-mbd-component-img" src="assets/images/mbd.png" width="100" height="100"></span><span id="add-mbd-component-id"></span><span class="smallname"id="add-mbd-component-name"></span><span class="price" id="add-mbd-component-price"></span><span id="add-mbd-component-wattage-input"></span><span id="add-mbd-component-compatibility-input"><span id="add-mbd-component-mbdFormFactor-input"><span id="add-mbd-component-ramSlots-input"><span id="add-mbd-component-ramGen-input"></span><span class="price" id="add-mbd-component-price-input"></span><span id="add-mbd-component-maxSupportedRamFrequency-input"></span><span id="add-mbd-component-maxSupportedRamCapacity-input"></span></div>';
        $('#empty-mbd').append(deffault);
       
       
        
       
        var buttonHTML = '<button class="btn" id="add-mbd-btn" style="background-color: #e59053"><b>Add</b></button>';
        $('#parent-element-id2').append(buttonHTML);
        $(document).off('click', '#add-mbd-btn');
        $(document).one('click', function() {
          getMBD();
        });
        
       
        $('#reset-mbd-compatibility-btn').remove();
        calculateEstimatedWattage();
        calculateBuildPrice();
      });
    }

    function gpuReset() {
        $('#reset-gpu-btn').click(function() {
          $('#empty-gpu').empty();
          var deffault = '<div class="component-info"><span><img id="add-gpu-component-img" src="assets/images/gpu.png" width="100" height="100"></span><span id="add-mbd-component-id"></span><span id="add-gpu-component-id"></span><span class="smallname"id="add-gpu-component-name"></span><span class="price" id="add-gpu-component-price"></span><span id="add-gpu-component-wattage-input"></span><span id="add-gpu-component-gpuFormFactor-input"></span><span class="price" id="add-gpu-component-price-input"></span></div>';
          $('#empty-gpu').append(deffault);
          var buttonHTML = '<button class="btn" id="add-gpu-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id3').append(buttonHTML);
          $(document).off('click', '#add-gpu-btn');
          $(document).one('click', function() {
            getGPU();
          });
          $('#reset-gpu-btn').remove();
          calculateEstimatedWattage();
          calculateBuildPrice();
        });
      }

      function ramReset() {
        $('#reset-ram-btn').click(function() {
          $('#empty-ram').empty();
          var deffault = '<div class="component-info"><span><img id="add-ram-component-img" src="assets/images/ram.png"width="100" height="100"></span><span id="add-ram-component-id"></span><span class="smallname"id="add-ram-component-name"></span><span class="price" id="add-ram-component-price"></span><span class="price" id="add-ram-component-price-input"></span><span id="add-ram-component-frequency-input"></span><span id="add-ram-component-capacity-input"></span><span id="add-ram-component-generation-input"></span><span id="add-ram-component-slots-input"></span></div>';
          $('#empty-ram').append(deffault);
          var buttonHTML = '<button class="btn" id="add-ram-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id4').append(buttonHTML);
          $(document).off('click', '#add-ram-btn');
          $(document).one('click', function() {
            getRAM();
          });
          $('#reset-ram-btn').remove();
          calculateBuildPrice();
        });
      }

      function storageReset() {
          $('#reset-storage-btn').click(function() {
          $('#empty-storage').empty();
          var deffault = '<div class="component-info"><span><img id="add-storage-component-img" src="assets/images/ssd.png" width="100" height="100"></span><span id="add-storage-component-id"></span><span class="smallname"id="add-storage-component-name"></span><span class="price" id="add-storage-component-price"></span><span class="price" id="add-storage-component-price-input"></span></div>';
          $('#empty-storage').append(deffault);
          var buttonHTML = '<button class="btn" id="add-storage-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id5').append(buttonHTML);
          $(document).off('click', '#add-storage-btn');
          $(document).one('click', function() {
            getStorage();
          });
          $('#reset-storage-btn').remove();
          calculateBuildPrice();
        });
      }

      function coolingReset() {
        $('#reset-cooling-btn').click(function() {
          $('#empty-cooling').empty();
          var deffault = '<div class="component-info"><span><img id="add-cooler-component-img" src="assets/images/cooler.png" width="100" height="100"></span><span id="add-cooler-component-id"></span><span class="smallname"id="add-cooler-component-name"></span><span class="price" id="add-cooler-component-price"></span><span class="price" id="add-cooler-component-price-input"></span></div>';
          $('#empty-cooling').append(deffault);
          var buttonHTML = '<button class="btn" id="add-cooling-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id6').append(buttonHTML);
          $(document).off('click', '#add-cooling-btn');
          $(document).one('click', function() {
            getCooling();
          });
          $('#reset-cooling-btn').remove();
          calculateBuildPrice();
        });
      }

      function caseReset() {
        $('#reset-case-btn').click(function() {
         $('#empty-case').empty();
         var deffault = '<div class="component-info"><span><img id="add-case-component-img" src="assets/images/case.png" width="100" height="100"></span><span id="add-case-component-id"></span><span class="smallname"id="add-case-component-name"></span><span class="price" id="add-case-component-price"></span><span class="price" id="add-case-component-price-input"></span><span id="add-case-component-formFactor-input"></span></div>';
         $('#empty-case').append(deffault);
          var buttonHTML = '<button class="btn" id="add-case-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id7').append(buttonHTML);
          $(document).off('click', '#add-case-btn');
          $(document).one('click', function() {
            getCase();
          });
          $('#reset-case-btn').remove();
          calculateBuildPrice();
        });
      }

      function psuReset() {
        $('#reset-psu-btn').click(function() {
          $('#empty-psu').empty();
          var deffault = '<div class="component-info"><span><img id="add-psu-component-img" src="assets/images/psu.png"width="100" height="100"></span><span id="add-psu-component-id"></span><span class="smallname"id="add-psu-component-name"></span><span class="price" id="add-psu-component-price"></span><span class="price" id="add-psu-component-price-input"></span></div>';
          $('#empty-psu').append(deffault);
          var buttonHTML = '<button class="btn" id="add-psu-btn" style="background-color: #e59053"><b>Add</b></button>';
          $('#parent-element-id8').append(buttonHTML);
          $(document).off('click', '#add-psu-btn');
          $(document).one('click', function() {
            getPsu();
          });
          $('#reset-psu-btn').remove();
          calculateBuildPrice();
        });
      }
    cpuReset();
    mbdReset();
    gpuReset();
    ramReset();
    storageReset();
    caseReset();
    psuReset();
    coolingReset();


      
function getCPU() {
    $('#add-cpu-btn').click(function() {
        $("#myModal").show();
        $('#add-component-btn').html('Add CPU');
        $('#add-component-img').attr('src', 'assets/images/cpu.png');
        $('#add-component-name').text('');
        $('#add-component-wattage').text('');
        $('#add-component-brand').text('');
        $('#reset-compatibility-btn').text('');
        var compatibility= $('#add-mbd-component-compatibility-input').val();
       
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: 'get-cpu',
          method: 'GET',
          data:{'compatibility':compatibility},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              var html = '<tr class="product" data-id="' + product.id + '" data-brand="' + product.brand + '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice +'">' +
                '<td><img src="assets/images/uploads/' + product.productImage + '" width="120" height="120"></td>' +
                '<td>' + product.productName + '</td>' +
                '<td>$' + product.productPrice + '</td>' +
              '</tr>'
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching CPU products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .product', function() {
            var id = $(this).data('id');
            var brand = $(this).data('brand');
            var wattage = $(this).data('wattage');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
          
            $('#add-component-btn').html('<img src="' + img + '" width="100" height="100"> ' + name);
            $('#add-component-img').attr('src', img);
            $('#add-component-name').text(name);
            $('#add-component-price').text(price);
            $('#add-cpu-btn').remove();
            $('#reset-compatibility-btn').remove();
            var buttonHTML = '<span class="close" id="reset-compatibility-btn">&times</span>';
            $('#parent-element-id').append(buttonHTML);
            $(document).off('click', '#reset-compatibility-btn');
            cpuReset();
            $('#add-component-wattage-input').val(wattage);
            $('#add-cpu-btn').remove();
            $('#add-component-brand-input').val(brand);
            $('#add-component-price-input').val(priceInput);
            $('#add-component-id').val(id);
            $("#myModal").hide();
            calculateEstimatedWattage();
            calculateBuildPrice();
            
          });
          
      });
    }
    getCPU();

function getMBD() {
      $('#add-mbd-btn').click(function() {
        $("#myModal").show();
        var productClassDataBrand = $('#add-component-brand-input').val();
        var productClassDataFrequency = $('#add-ram-component-frequency-input').val();
        var productClassDataCapacity = $('#add-ram-component-capacity-input').val();
        var productClassDataRamGen = $('#add-ram-component-generation-input').val();
        var productClassDataRamSlots = $('#add-ram-component-slots-input').val();
        var productClassDataFormFactor = $('#add-case-component-formFactor-input').val();
      


        $('#add-mbd-component-btn').html('Add mbd');
        $('#add-mbd-component-img').attr('src', '');
        $('#add-mbd-component-name').text('');
        $('#add-mbd-component-wattage').text('');
        $('#add-mbd-component-compatibility').text('');
        $('#add-mbd-component-ramSlots').text('');
        $('#add-mbd-component-ramGen').text('');
        $('#add-mbd-component-mbdFormFactor').text('');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: 'get-mbd',
          method: 'GET',
          data : {brand : productClassDataBrand, frequency : productClassDataFrequency, capacity : productClassDataCapacity, generation : productClassDataRamGen, slots : productClassDataRamSlots, caseFormFactor : productClassDataFormFactor},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              
            if(product.freqexcced == true && product.capexcced == true){
                
                var html = '<tr class="mbdProduct" data-id="' + product.id + '" data-compatibility="' + product.compatibility +  '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice + '" data-mbdformfactor="' + product.mbdFormFactor + '" data-ramslots="' + product.ramSlots + '" data-ramgen="' + product.ramGen + '" data-maxsupportedfreq="' + product.maxSupportedRamFrequency + '" data-maxsupportedcapacity="' + product.maxSupportedRamCapacity +'">'  +
                '<td><img src="assets/images/uploads/' + product.productImage + '" width="120" height="120"></td>' +
                '<td><span>' + product.productName + ' </span><br><label><div class="alert error"><span class="alertText">Downclocking limitation: Please keep in mind that only ' + product.maxSupportedRamFrequency+ 'MHz will be used from ' + productClassDataFrequency+ 'MHZ selected RAM.</span> </div></label><label><div class="alert error"><span class="alertText">Unused memory: Please keep in mind that only ' + product.maxSupportedRamCapacity  + 'GB will be used from ' +  productClassDataCapacity+ 'GB selected RAM.</span> </div></label></td>' +
                '<td>$' + product.productPrice + '</td>' +
              '</tr>'
            }else if(product.freqexcced == true && product.capexcced == false){
                var html = '<tr class="mbdProduct" data-id="' + product.id + '" data-compatibility="' + product.compatibility +  '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice + '" data-mbdformfactor="' + product.mbdFormFactor + '" data-ramslots="' + product.ramSlots + '" data-ramgen="' + product.ramGen + '" data-maxsupportedfreq="' + product.maxSupportedRamFrequency + '" data-maxsupportedcapacity="' + product.maxSupportedRamCapacity +'">'  +
                '<td><img src="assets/images/uploads/' + product.productImage + '" width="120" height="120"></td>' +
                '<td><span>' + product.productName + ' </span><br><label><div class="alert error"><span class="alertText">Downclocking limitation: Please keep in mind that only ' + product.maxSupportedRamFrequency+ 'MHz will be used from ' + productClassDataFrequency+ 'MHZ selected RAM.</span> </div></label></td>' +
                '<td>$' + product.productPrice + '</td>' +
              '</tr>'
                
                
               
            }else if(product.freqexcced == false && product.capexcced == true){
                var html = '<tr class="mbdProduct" data-id="' + product.id + '" data-compatibility="' + product.compatibility +  '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice + '" data-mbdformfactor="' + product.mbdFormFactor + '" data-ramslots="' + product.ramSlots + '" data-ramgen="' + product.ramGen + '" data-maxsupportedfreq="' + product.maxSupportedRamFrequency + '" data-maxsupportedcapacity="' + product.maxSupportedRamCapacity +'">'  +
                '<td><img src="assets/images/uploads/' + product.productImage + '" width="120" height="120"></td>' +
                '<td><span>' + product.productName + ' </span><br><label><div class="alert error"><span class="alertText">Unused memory: Please keep in mind that only ' + product.maxSupportedRamCapacity  + 'GB will be used from ' +  productClassDataCapacity+ 'GB selected RAM.</span> </div></label></td>' +
                '<td>$' + product.productPrice + '</td>' +
              '</tr>'
                
            }else{
                var html = '<tr class="mbdProduct" data-id="' + product.id + '" data-compatibility="' + product.compatibility +  '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice + '" data-mbdformfactor="' + product.mbdFormFactor + '" data-ramslots="' + product.ramSlots + '" data-ramgen="' + product.ramGen + '" data-maxsupportedfreq="' + product.maxSupportedRamFrequency + '" data-maxsupportedcapacity="' + product.maxSupportedRamCapacity +'">'  +
                '<td><img src="assets/images/uploads/' + product.productImage + '" width="120" height="120"></td>' +
                '<td><span>' + product.productName + ' </span></td>' +
                '<td>$' + product.productPrice + '</td>' +
              '</tr>'
            }
              $('#myModal .modal-body tbody').append(html);
            
            }
            
          },
          error: function() {
            alert('Error fetching motherboards products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .mbdProduct', function() {
            var id = $(this).data('id');
            var wattage = $(this).data('wattage');
            var name = $(this).find('td:eq(1) span:first').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var compatibility = $(this).data('compatibility');
            var priceInput = $(this).data('price');
            var mbdFormFactor = $(this).data('mbdformfactor');
            var ramSlots = $(this).data('ramslots');
            var ramGen = $(this).data('ramgen');
            var maxSupportedRamFrequency = $(this).data('maxsupportedfreq');
            var maxSupportedRamCapacity = $(this).data('maxsupportedcapacity');
       
            
            
          
            $('#add-component-btn').html('<img src="' + img + '" width="100" height="100"> ' + name);
            $('#add-mbd-component-img').attr('src', img);
            $('#add-mbd-component-name').text(name);
            $('#add-mbd-component-price').text(price);
            $('#add-mbd-btn').remove();
            $('#reset-mbd-compatibility-btn').remove();
            var buttonHTML = '<span class="close" id="reset-mbd-compatibility-btn">&times</span>';
            $('#parent-element-id2').append(buttonHTML);
            $(document).off('click', '#reset-mbd-compatibility-btn');
            mbdReset();
            $('#add-mbd-component-wattage-input').val(wattage);
            $('#add-mbd-component-compatibility-input').val(compatibility);
            $('#add-mbd-component-price-input').val(priceInput);
            $('#add-mbd-component-mbdFormFactor-input').val(mbdFormFactor);
            $('#add-mbd-component-ramSlots-input').val(ramSlots);
            $('#add-mbd-component-ramGen-input').val(ramGen);
            $('#add-mbd-component-maxSupportedRamFrequency-input').val(maxSupportedRamFrequency);
            $('#add-mbd-component-maxSupportedRamCapacity-input').val(maxSupportedRamCapacity);
            $('#add-mbd-component-id').val(id);
            $("#myModal").hide();
            calculateEstimatedWattage();
            calculateBuildPrice();
          });
      });
    }
    getMBD();
      
function getGPU() {
      $('#add-gpu-btn').click(function() {
        $("#myModal").show();
        var productClassDataformFactor = $('#add-case-component-formFactor-input').val();
       
        $('#add-gpu-component-btn').html('Add GPU');
        $('#add-gpu-component-img').attr('src', '');
        $('#add-gpu-component-name').text('');
        $('#add-gpu-component-wattage').text('');
        $('#add-gpu-component-gpuFormFactor').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'get-gpu',
          method: 'GET',
          data: {formFactor : productClassDataformFactor},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              var html = '<tr class="gpuProduct" data-id="' + product.id + '" data-wattage="' + product.wattage + '" data-price="' + product.productPrice  + '" data-gpuformfactor="' + product.gpuFormFactor +'">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td>' + product.productName + '</td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching GPU products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .gpuProduct', function() {
            var id = $(this).data('id');
            var wattage = $(this).data('wattage');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
            var gpuFormFactor = $(this).data('gpuformfactor');
          
            $('#add-gpu-component-btn').html('<img src="' + img + '" width="100" height="100"> ' + name);
            $('#add-gpu-component-img').attr('src', img);
            $('#add-gpu-component-name').text(name);
            $('#add-gpu-btn').remove();
            $('#reset-gpu-btn').remove();
            var buttonHTML = '<span class="close" id="reset-gpu-btn">&times</span>';
            $('#parent-element-id3').append(buttonHTML);
            $(document).off('click', '#reset-gpu-btn');
            gpuReset();
            $('#add-gpu-component-price').text(price);
            $('#add-gpu-component-wattage-input').val(wattage);
            $('#add-gpu-component-price-input').val(priceInput);
            $('#add-gpu-component-gpuFormFactor-input').val(gpuFormFactor);
            $('#add-gpu-component-id').val(id);
            $("#myModal").hide();
            calculateEstimatedWattage();
            calculateBuildPrice();
          });
      });
    }
    getGPU();
function getRAM() {
      $('#add-ram-btn').click(function() {
        $("#myModal").show();
        var productClassDataRamSlots = $('#add-mbd-component-ramSlots-input').val();
        var productClassDataRamGen = $('#add-mbd-component-ramGen-input').val();
        var productClassDataRamFrequency = $('#add-mbd-component-maxSupportedRamFrequency-input').val();
        var productClassDataRamCapacity = $('#add-mbd-component-maxSupportedRamCapacity-input').val();
        
        $('#add-ram-component-btn').html('Add RAM');
        $('#add-ram-component-img').attr('src', '');
        $('#add-ram-component-name').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'get-ram',
          method: 'GET',
          data: {Slots : productClassDataRamSlots, Generation : productClassDataRamGen, Frequency : productClassDataRamFrequency, Capacity : productClassDataRamCapacity},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              if (product.freqtest == true && product.captest == true) {
                var html = '<tr class="ramProduct" data-id="' + product.id + '" data-price="' + product.productPrice  + '" data-frequency="' + product.frequency + '" data-capacity="' + product.capacity +'" data-generation="' + product.generation +'" data-slots="' + product.slots + '">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td><span>' + product.productName + '</span><br><label><div class="alert error"><span class="alertText">Downclocking limitation: Please keep in mind that only ' + productClassDataRamFrequency + 'MHz will be used from ' + product.frequency+ 'MHZ on the selected motherboard.</span> </div></label><label><div class="alert error"><span class="alertText">Unused memory: Please keep in mind that only ' + product.capacity  + 'GB will be used from ' +  productClassDataRamCapacity+ 'GB one the selected motherboard.</span> </div></label></td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';

              }else if (product.freqtest == true && product.captest == false) {
                var html = '<tr class="ramProduct" data-id="' + product.id + '" data-price="' + product.productPrice  + '" data-frequency="' + product.frequency + '" data-capacity="' + product.capacity +'" data-generation="' + product.generation +'" data-slots="' + product.slots + '">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td><span>' + product.productName + '</span><br><label><div class="alert error"><span class="alertText">Downclocking limitation: Please keep in mind that only ' + productClassDataRamFrequency + 'MHz will be used from ' + product.frequency+ 'MHZ on the selected motherboard.</span> </div></label></td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
                
              }else if (product.freqtest == false && product.captest == true) {
                var html = '<tr class="ramProduct" data-id="' + product.id + '" data-price="' + product.productPrice  + '" data-frequency="' + product.frequency + '" data-capacity="' + product.capacity +'" data-generation="' + product.generation +'" data-slots="' + product.slots + '">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td><span>' + product.productName + '</span><br><label><div class="alert error"><span class="alertText">Unused memory: Please keep in mind that only ' + product.capacity  + 'GB will be used from ' +  productClassDataRamCapacity+ 'GB one the selected motherboard.</span> </div></label></td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
                
              }else {
              var html = '<tr class="ramProduct" data-id="' + product.id + '" data-price="' + product.productPrice  + '" data-frequency="' + product.frequency + '" data-capacity="' + product.capacity +'" data-generation="' + product.generation +'" data-slots="' + product.slots + '">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td><span>' + product.productName + '</span></td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
                }
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching RAM products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .ramProduct', function() {
            var id = $(this).data('id');
            var name = $(this).find('td:eq(1) span:first').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
            var frequency = $(this).data('frequency');
            var capacity = $(this).data('capacity');
            var generation = $(this).data('generation');
            var slots = $(this).data('slots');
           
          
            $('#add-ram-component-btn').html('<img src="' + img + '" width="100" height="100"> ' + name);
            $('#add-ram-component-img').attr('src', img);
            $('#add-ram-btn').remove();
            $('#reset-ram-btn').remove();
            var buttonHTML = '<span class="close" id="reset-ram-btn">&times</span>';
            $('#parent-element-id4').append(buttonHTML);
            $(document).off('click', '#reset-ram-btn');
            ramReset();
            $('#add-ram-component-name').text(name);
            $('#add-ram-component-price').text(price);
            $('#add-ram-component-price-input').val(priceInput);
            $('#add-ram-component-frequency-input').val(frequency);
            $('#add-ram-component-capacity-input').val(capacity);
            $('#add-ram-component-generation-input').val(generation);
            $('#add-ram-component-slots-input').val(slots);
            $('#add-ram-component-id').val(id);
            $("#myModal").hide();
            calculateBuildPrice();
            
          });
      });
    }
    getRAM();
function getStorage() {
      $('#add-storage-btn').click(function() {
        $("#myModal").show();
        $('#add-storage-component-btn').html('Add storage');
        $('#add-storage-component-img').attr('src', '');
        $('#add-storage-component-name').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'get-storage',
          method: 'GET',
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              var html = '<tr class="storageProduct"  data-id="' + product.id + '" data-price="' + product.productPrice+'">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td>' + product.productName + '</td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching storage products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .storageProduct', function() {
            var id = $(this).data('id');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
          
            $('#add-storage-component-btn').html('<img src="' + img + '" width="120" height="120"> ' + name);
            $('#add-storage-component-img').attr('src', img);
            $('#add-storage-btn').remove();
            $('#reset-storage-btn').remove();
            var buttonHTML = '<span class="close" id="reset-storage-btn">&times</span>';
            $('#parent-element-id5').append(buttonHTML);
            $(document).off('click', '#reset-storage-btn');
            storageReset();
            $('#add-storage-component-name').text(name);
            $('#add-storage-component-price').text(price);
            $('#add-storage-component-price-input').val(priceInput);
            $('#add-storage-component-id').val(id);
            $("#myModal").hide();
            calculateBuildPrice();
            
          });
      })
    }
    getStorage();
function getCase() {

      $('#add-case-btn').click(function() {
        $("#myModal").show();
        var productClassDataMbdFormFactor = $('#add-mbd-component-mbdFormFactor-input').val();
        var productClassDataGpuFormFactor = $('#add-gpu-component-gpuFormFactor-input').val();
        

        $('#add-case-component-btn').html('Add case');
        $('#add-case-component-img').attr('src', '');
        $('#add-case-component-name').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'get-casing',
          method: 'GET',
          data: {MbdFormFactor :  productClassDataMbdFormFactor , GpuFormFactor : productClassDataGpuFormFactor},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              var html = '<tr class="caseProduct" data-id="' + product.id + '" data-price="' + product.productPrice+'" data-formfactor="' + product.formFactor+'">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="120" height="120"></td>' +
                           '<td>' + product.productName + '</td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching casing products.');
          }
        });
        $(document).on('click', '#myModal .modal-body .caseProduct', function() {
            var id = $(this).data('id');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
            var formFactor = $(this).data('formfactor');
            
          
            $('#add-case-component-btn').html('<img src="' + img + '" width="120" height="120"> ' + name);
            $('#add-case-component-img').attr('src', img);
            $('#add-case-btn').remove();
            $('#reset-case-btn').remove();
            var buttonHTML = '<span class="close" id="reset-case-btn">&times</span>';
            $('#parent-element-id7').append(buttonHTML);
            $(document).off('click', '#reset-case-btn');
            caseReset();
            $('#add-case-component-name').text(name);
            $('#add-case-component-price').text(price);
            $('#add-case-component-price-input').val(priceInput);
            $('#add-case-component-formFactor-input').val(formFactor);
            $('#add-case-component-id').val(id);
            $("#myModal").hide();
            calculateBuildPrice();
            
          });
      })
    }
    getCase();

function getCooling() {
      $('#add-cooling-btn').click(function() {
        $("#myModal").show();
        $('#add-cooler-component-btn').html('Add cooler');
        $('#add-cooler-component-img').attr('src', '');
        $('#add-cooler-component-name').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'get-cooler',
          method: 'GET',
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
              var product = response[i];
              var html = '<tr class="coolerProduct" data-id="' + product.id + '" data-price="' + product.productPrice+'">' +
                           '<td><img src="assets/images/uploads/' + product.productImage + '" + width="100"+ height="100"></td>' +
                           '<td>' + product.productName + '</td>' +
                           '<td>$' + product.productPrice + '</td>' +
                         '</tr>';
              $('#myModal .modal-body tbody').append(html);
            }
          },
          error: function() {
            alert('Error fetching cooler products.');
          }
        });

        $(document).on('click', '#myModal .modal-body .coolerProduct', function() {
            var id = $(this).data('id');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
          
            $('#add-cooler-component-btn').html('<img src="' + img + '" width="120" height="120"> ' + name);
            $('#add-cooler-component-img').attr('src', img);
            $('#add-cooling-btn').remove();
            $('#reset-cooling-btn').remove();
            var buttonHTML = '<span class="close" id="reset-cooling-btn">&times</span>';
            $('#parent-element-id6').append(buttonHTML);
            $(document).off('click', '#reset-cooling-btn');
            coolingReset();
            $('#add-cooler-component-name').text(name);
            $('#add-cooler-component-price').text(price);
            $('#add-cooler-component-price-input').val(priceInput);
            $('#add-cooler-component-id').val(id);
            
            $("#myModal").hide();
            calculateBuildPrice();
            
          });
      })
    }
    getCooling();
    function getPsu() {
      $('#add-psu-btn').click(function() {
        $("#myModal").show();
        
        $('#add-psu-component-btn').html('Add cooler');
        $('#add-psu-component-img').attr('src', '');
        $('#add-psu-component-name').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var cpuwattage = parseInt($('#add-component-wattage-input').val()) || 0;
        var mbdwatage = parseInt($('#add-mbd-component-wattage-input').val()) || 0;
        var gpuwattage = parseInt($('#add-gpu-component-wattage-input').val()) || 0;    
        var wattage = parseInt(cpuwattage) + parseInt(mbdwatage) + parseInt(gpuwattage);
        
      
        

        $.ajax({
          url: 'get-psu',
          method: 'GET',
          data: {wattage: wattage},
          success: function(response) {
            $('#myModal .modal-body tbody').empty();
            for (var i = 0; i < response.length; i++) {
                var product = response[i];
                var html = '<tr class="psuProduct" data-id="' + product.id + '" data-price="' + product.productPrice+'">' +
                             '<td> <img src="assets/images/uploads/' + product.productImage + '"width="120" height="120"></td>' +
                             '<td>' + product.productName + '</td>' +
                             '<td> $' + product.productPrice + '</td>' +
                           '</tr>';
                $('#myModal .modal-body tbody').append(html);
              }
          },
          error: function() {
            alert('Error fetching psu products.');
          }
        });

        $(document).on('click', '#myModal .modal-body .psuProduct', function() {
            var id = $(this).data('id');
            var name = $(this).find('td:eq(1)').text();
            var img = $(this).find('img').attr('src');
            var price = $(this).find('td:eq(2)').text();
            var priceInput = $(this).data('price');
          
            $('#add-psu-component-btn').html('<img src="' + img + '" width="100" height="100"> ' + name);
            $('#add-psu-component-img').attr('src', img);
            $('#add-psu-btn').remove();
            $('#reset-psu-btn').remove();
            var buttonHTML = '<span class="close" id="reset-psu-btn">&times</span>';
            $('#parent-element-id8').append(buttonHTML);
            $(document).off('click', '#reset-psu-btn');
            psuReset();
            $('#add-psu-component-name').text(name);
            $('#add-psu-component-price').text(price);
            $('#add-psu-component-price-input').val(priceInput);
            $('#add-psu-component-id').val(id);
            $("#myModal").hide();
            calculateBuildPrice();
            
          });
      })
    }
    getPsu();

     
       
    


     
       

      
  });

  function calculateEstimatedWattage() {
    var cpuWattageInput = $('#add-component-wattage-input').val();
    var gpuWattageInput = $('#add-gpu-component-wattage-input').val();
    var mbdWattageInput = $('#add-mbd-component-wattage-input').val();
    var cpuWattage = validateAndParseWattage(cpuWattageInput);
    var gpuWattage = validateAndParseWattage(gpuWattageInput);
    var mbdWattage = validateAndParseWattage(mbdWattageInput);
    var totalWattage = cpuWattage + gpuWattage +mbdWattage;
    if (!isNaN(totalWattage)) {
      $('.estimated-wattage-needed').text('~ '+totalWattage+'W');
    } else {
      $('.estimated-wattage-needed').text('Invalid input');
    }
  }
  
  function validateAndParseWattage(wattageInput) {
    if (wattageInput.trim() === '') {
      return 0; 
    }
    var wattage = parseInt(wattageInput);
    if (!isNaN(wattage)) {
      return wattage;
    } else {
      return 0; 
    }
  }


  function calculateBuildPrice() {

    var cpuPriceInput = $('#add-component-price-input').val();
    var gpuPriceInput = $('#add-gpu-component-price-input').val();
    var mbdPriceInput = $('#add-mbd-component-price-input').val();
    var ramPriceInput = $('#add-ram-component-price-input').val();
    var storagePriceInput = $('#add-storage-component-price-input').val();
    var psuPriceInput = $('#add-psu-component-price-input').val();
    var coolerPriceInput = $('#add-cooler-component-price-input').val();
    var casePriceInput = $('#add-case-component-price-input').val();
    var cpuPrice = validateAndParsePrice(cpuPriceInput);
    var gpuPrice = validateAndParsePrice(gpuPriceInput);
    var mbdPrice = validateAndParsePrice(mbdPriceInput);
    var ramPrice = validateAndParsePrice(ramPriceInput);
    var storagePrice = validateAndParsePrice(storagePriceInput);
    var psuPrice = validateAndParsePrice(psuPriceInput);
    var coolerPrice = validateAndParsePrice(coolerPriceInput);
    var casePrice = validateAndParsePrice(casePriceInput);
    var totalPrice = cpuPrice + gpuPrice +mbdPrice + ramPrice + storagePrice + psuPrice + coolerPrice + casePrice;
    if (!isNaN(totalPrice)) {
      $('.total-pc-build-price').text('$'+totalPrice);
      $('#total-pc-build-price').val(totalPrice);

    } else {
      $('.total-pc-build-price').text('Invalid input');
    }
  }
  
  function validateAndParsePrice(priceInput) {
    if (priceInput.trim() === '') {
      return 0; 
    }
    var price = parseInt(priceInput);
    if (!isNaN(price)) {
      return price;
    } else {
      return 0; 
    }
  }

  $(document).ready(function(){
    $('.ondelivery').click(function(e){ 
            var name = $('.name').val();
            var lastname = $('.lastname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var state = $('.state').val();
            var zipcode = $('.zipcode').val();
            var cpu = $('#add-component-id').val();
            var gpu = $('#add-gpu-component-id').val();
            var ram = $('#add-ram-component-id').val();
            var mbd = $('#add-mbd-component-id').val();
            var psu = $('#add-psu-component-id').val();
            var storage = $('#add-storage-component-id').val();
            var pccase = $('#add-case-component-id').val();
            var cooler = $('#add-cooler-component-id').val();
            var total = $('#total-pc-build-price').val();
            var type = 'ondelivery';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/pc-builder-order",
            data : {
                        'name': name,
                        'lastname': lastname,
                        'email': email,
                        'phone': phone,
                        'address1': address1,
                        'address2': address2,
                        'state': state,
                        'zipcode': zipcode,
                        'cpu': cpu,
                        'gpu': gpu,
                        'ram': ram,
                        'mbd': mbd,
                        'psu': psu,
                        'storage': storage,
                        'case': pccase,
                        'cooler': cooler,
                        'type': type,
            },
            success : function(response){
              window.location.href = "/emailsent";
            }
        });
  });
});




$(document).ready(function(){ 
    $('.stockbtn').click(function(e){ 
        var product_id = $(this).closest('.single-product-description').find('.product_id').val();
        var email = $(this).closest('.single-product-description').find('#email').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/stock-notify",
            data : {
                'email' : email,
                'product_id' : product_id,
            },
            success : function(response){
                console.log(product_id);
            }
        });
  });
});








$(document).ready(function(){ 

    $('.qtybtn').click(function(e){
        

        var product_id = $(this).closest('[data-product-container]').find('.product_id').val();
        var product_quantity = $(this).closest('[data-product-container]').find('.product_quantity').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method : "POST",
            url : "/modify-cart",
            data : {
                'new_val' : product_quantity,
                'product_id' : product_id,
            },
            success : function(response){
                console.log(product_id);
            }
        });

        $.ajax({
            method : "GET",
            url : "/count-total-price",
            data : {
                'product_id' : product_id,
            },
            success : function(response){
                 $('.total_price_count').html('$' +response.total+'.00');
                
                
            }
        });

        $.ajax({
            method : "GET",
            url : "/count-total-price",
            data : {
                'product_id' : product_id,
            },
            success : function(response){
                var total = parseInt(response.total) + 10;
                total = '$' + total + '.00';
                 $('.grand_total').html(total);
                
                
            }
        });
    });
//This section is for the checkout page count total price
    var product_id = $(this).closest('[data-product-container]').find('.product_id').val();
    $.ajax({
        method : "GET",
        url : "/count-total-price",
        data : {
            'product_id' : product_id,
        },
        success : function(response){
            var total = parseInt(response.total) + 10;
            total = '$' + total + '.00';
             $('.grand_total_checkout').html(total);
            
            
        }
    });
    $.ajax({
        method : "GET",
        url : "/count-total-price",
        data : {
            'product_id' : product_id,
        },
        success : function(response){
             $('.grand_total_checkout2').html('$' + response.total+ '.00');
            
            
        }
    });

    $('.delete-from-cart').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('[data-product-container]').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method : "POST",
            url : "/delete-from-cart",
            data : {
                'product_id' : product_id,
            },
            success : function(response){
                window.location.reload();
                swal ( "" ,response.status,"success" );
            }
        });

    });

    $('.delete-from-wishlist').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.product').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method : "POST",
            url : "/delete-from-wishlist",
            data : {
                'product_id' : product_id,
            },
            success : function(response){
                window.location.reload();
                swal ( "" ,response.status,"success" );
            }
        });

    });

});



$(document).ready(function(){ 
    $('.place-order1').click(function(e){
        e.preventDefault();
        var name = $('.name').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var state = $('.state').val();
        var zipcode = $('.zipcode').val();

        var name_error = '';
        var lastname_error = '';
        var email_error = '';
        var phone_error = '';
        var address1_error = '';
        var state_error = '';
        var zipcode_error = '';

        if (!name) {
            name_error = "Name is required";
        }
        if (!lastname) {
            lastname_error = "Lastname is required";
        }
        if (!email) {
            email_error = "Email is required";
        }
        if (!phone) {
            phone_error = "Phone number is required";
        }
        if (!address1) {
            address1_error = "Address1 is required";
        }
        if (!state) {
            state_error = "State is required";
        }
        if (!zipcode) {
            zipcode_error = "Zipcode is required";
        }

        if (name_error || lastname_error || email_error || phone_error || address1_error || state_error || zipcode_error) {
            $('#name_error').html(name_error);
            $('#lname_error').html(lastname_error);
            $('#email_error').html(email_error);
            $('#phone_error').html(phone_error);
            $('#address1_error').html(address1_error);
            $('#state_error').html(state_error);
            $('#zipcode_error').html(zipcode_error);
            

            return false;
        }

        $('#name_error').html('');
        $('#lname_error').html('');
        $('#email_error').html('');
        $('#phone_error').html('');
        $('#address1_error').html('');
        $('#state_error').html('');
        $('#zipcode_error').html('');


    
    });

});


    
/*----- 
	Shipping Form Toggle
--------------------------------*/ 
$('[data-shipping]').on('click', function(){
    if( $('[data-shipping]:checked').length > 0 ) {
        $('#shipping-form').slideDown();
    } else {
        $('#shipping-form').slideUp();
    }
})
    
/*----- 
	Payment Method Select
--------------------------------*/
$('[name="payment-method"]').on('click', function(){
    
    var $value = $(this).attr('value');

    $('.single-method p').slideUp();
    $('[data-method="'+$value+'"]').slideDown();
    
})
    
/*----- 
	Account Image Upload
--------------------------------*/
$('#account-image-upload').on('change', function () {
  var filename = $(this).val();
  if (/^\s*$/.test(filename)) {
    $(".account-image-label").text("Choose your image"); 
  }
  else {
    $(".account-image-label").text(filename.replace("C:\\fakepath\\", ""));
  }
});
    
    
})(jQuery);	
