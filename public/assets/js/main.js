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
    
    // Remove active class from all view mode icons
    $('.product-view-mode a').removeClass('active');
    
    // Add active class to current view mode icon
    $(this).addClass('active');
    
    // Remove previous view mode class and add current view mode class to shop product wrap
    shopProductWrap.removeClass('grid list').addClass(viewMode);
    
    // Store current view mode in local storage
    localStorage.setItem('viewMode', viewMode);
});

// Set initial view mode based on local storage
var viewMode = localStorage.getItem('viewMode');
if (viewMode) {
    $('.product-view-mode a[data-target="' + viewMode + '"]').addClass('active');
    $('.shop-product-wrap').removeClass('grid list').addClass(viewMode);
}




$(document).ready(function(){ 

    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product').find('.product_id').val();
        var product_name = $(this).closest('.product').find('.product_name').val();
        var product_price = $(this).closest('.product').find('.product_price').val();
        var product_image = $(this).closest('.product').find('.product_image').val();
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
                $('.cart-count').html(response.count); // Update cart count dynamically
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
    
    var button = $(this); // store the button element in a variable
    
    if(button.hasClass('added')){
        button.removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart'); 
    } else{
        button.addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added'); 
    }
    
    setTimeout(function(){
        button.removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart'); 
    }, 800); // reset the button after 2 seconds
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
    var product_id = $(this).closest('.table').find('.product_id').val();
    var product_quantity = $(this).closest('.section').find('.product_quantity').val();
	var $button = $(this);
	var oldValue = $button.parent().find('input').val();
	if ($button.hasClass('inc')) {
	  var newVal = parseFloat(oldValue) + 1;
	} else {
	   // Don't allow decrementing below zero
	  if (oldValue > 0) {
		var newVal = parseFloat(oldValue) - 1;
		} else {
		newVal = 0;
	  }
	  }
	$button.parent().find('input').val(newVal);

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
//end of checkout page count total price
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

});

$(document).ready(function(){ 
    $('.place-order').click(function(e){
        e.preventDefault();
        var name = $('.name').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var state = $('.state').val();
        var zipcode = $('.zipcode').val();

       if(!name){
            var name_error = "Name required";
            $('#name_error').html('');
            $('#name_error').html(name_error);
         }else{
            name_error = '';
            $('#name_error').html('');

         }
        if(!lastname){
            var lastname_error = "Lastname required";
            $('#lname_error').html('');
            $('#lname_error').html(lastname_error);
         }else{
            lastname_error = '';
            $('#lname_error').html('');

         }
        if(!email){
            var email_error = "Email required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
         }else{
            email_error = '';
            $('#email_error').html('');

         }
        if(!phone){
            var phone_error = "Phone number required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
         }
            else{
            phone_error = '';
            $('#phone_error').html('');
            }
        if(!address1){
            var address1_error = "Address1 required";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
         }
            else{
            address1_error = '';
            $('#address1_error').html('');
        }
    
        if(!state){
            var state_error = "State required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
            else{
            state_error = '';
            $('#state_error').html('');
        }
        if(!zipcode){
            var zipcode_error = "Zipcode required";
            $('#zipcode_error').html('');
            $('#zipcode_error').html(zipcode_error);
         }
            else{
            zipcode_error = '';
            $('#zipcode_error').html('');
        }

        if(name_error != '' || lastname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || state_error != '' || zipcode_error != ''){
            return false;    
        }
        else{
  }
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
