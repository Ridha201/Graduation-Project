<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Livewire\ShopComponent;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PCBuilderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/product', function () {
    return view('singel-product');
});

Route::get('/product', function () {
    return view('singel-product');
});
Route::get('/popup', function () {
    return view('popup');
});

Route::get('/', [HomeController::class,'index']);





Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/track', function () {
    return view('trackOrder');
});

Route::get('/status', function () {
    return view('orderStatus');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/builder', function () {
    return view('pcBuilder');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/placed', function () {
    return view('orderplaced');
});

Route::get('/confirmation', function () {
    return view('orderconfirmation');
});

Route::get('email', function () {
    return view('emailsent');
});

Route::get('orders', function () {
    return view('myorders');
});
Route::get('testb', function () {
    return view('testb');
});

Route::get('emailsent', function () {
    return view('emailsent');
});

Route::get('about', function () {
    return view('aboutus');
});

Route::get('locate', function () {
    return view('locatestore');
});
Route::get('terms', function () {
    return view('terms');
});






Route::get('/email', function () {
    return view('auth.passwords.email');
})->name('email');

Route::get('/reset', function () {
    return view('auth.passwords.reset');
})->name('reset');


Route::get('login/google', 'App\Http\Controllers\Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'App\Http\Controllers\Auth\LoginController@handleGoogleCallback');

Route::get('login/facebook', 'App\Http\Controllers\Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'App\Http\Controllers\Auth\LoginController@handleFacebookCallback');


Route::get('login/twitter', 'App\Http\Controllers\Auth\LoginController@redirectToTwitter')->name('login.twitter');
Route::get('login/twitter/callback', 'App\Http\Controllers\Auth\LoginController@handleTwitterCallback');



Route::post('/contact',[ContactController::class, 'addContact']);

Route::get('/list',[ProductController::class, 'getProduct']);
//Route::get('/list/{category?}', [ProductController::class, 'getProduct'])->name('products.getProduct');




Route::get('/list',[ProductController::class,'getProduct'])->name('list.getProduct');
Route::get('/orders',[CheckoutController::class,'getOrderDetails']);
Route::get('/',[ProductController::class,'bestSellersProducts'])->name('bestSellersProducts');
Route::get('/f',[ProductController::class,'newArrivalProducts'])->name('newArrivalProducts');
Route::get('/list2',[ProductController::class,'getProduct2'])->name('list.getProduct2');


Route::get('/products', [ProductController::class,'show'])->name('single-product');

Route::get('/product-list',[ProductController::class,'getProduct2'])->name('product-list');

Route::post('/validate-cart',[CartController::class,'validateCart']);


Route::middleware(['auth'])->group(function () {
    Route::post('add-to-cart',[CartController::class,'addProduct']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('payPal',[CheckoutController::class,'payPalCheck']);
    Route::post('add-rating',[ReviewController::class,'addReview']);
    Route::post('add-to-wishlist',[WishlistController::class,'addProduct']);
    
});

Route::post('place-order',[CheckoutController::class,'placeOrder']);

Route::post('/set-order-status', [CheckoutController::class, 'setOrderStatus']);
Route::get('/confirmation',[CheckoutController::class,'getOrder']);


Route::post('place-order2',[CheckoutController::class,'placeOrderWithPaymentOndelivery']);




Route::post('/modify-cart',[CartController::class,'modifyCart']);



 

Route::get('/orders',[CheckoutController::class,'getOrderDetails']);


Route::get('/cart',[CartController::class,'getCart'])->name('list.getCart');

Route::get('/wishlist',[WishlistController::class,'getWishlist'])->name('list.getCart');

Route::get('/load-cart-data',[CartController::class,'cartCount']);
Route::get('/load-wishlist-data',[WishlistController::class,'wishlistCount']);
Route::get('/count-total-price',[CartController::class,'priceCount']);
Route::post('/delete-from-cart',[CartController::class,'deleteProduct']);
Route::post('/delete-from-wishlist',[WishlistController::class,'deleteProduct']);

Route::get('/total-review',[ReviewController::class,'totalReview']);
Route::post('/check-login',[AuthController::class,'checkLogin']);

Route::post('/login',[AuthController::class,'activeUsers']);

Route::post('/stock-notify',[CheckoutController::class,'stockEmailNotify']);

Route::get('/get-cpu',[PCBuilderController::class,'getCpuProducts']);
Route::get('/get-gpu',[PCBuilderController::class,'getGpuProducts']);
Route::get('/get-ram',[PCBuilderController::class,'getRamProducts']);
Route::get('/get-storage',[PCBuilderController::class,'getStorageProducts']);
Route::get('/get-mbd',[PCBuilderController::class,'getMotherboardProducts']);
Route::get('/get-psu',[PCBuilderController::class,'getPsuProducts']);
Route::get('/get-casing',[PCBuilderController::class,'getCasingProducts']);
Route::get('/get-cooler',[PCBuilderController::class,'getCoolerProducts']);
Route::post('/pc-builder-order',[CheckoutController::class,'PCBuilderOrder']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




