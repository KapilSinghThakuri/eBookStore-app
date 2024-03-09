<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\eBookStore\CartController;
use App\Http\Controllers\eBookStore\HomeController;
use App\Http\Controllers\eBookStore\LogInController;
use App\Http\Controllers\eBookStore\AboutUsController;
use App\Http\Controllers\eBookStore\ContactController;
use App\Http\Controllers\eBookStore\CheckOutController;
use App\Http\Controllers\eBookStore\PrivacyController;
use App\Http\Controllers\eBookStore\RegisterController;
use App\Http\Controllers\eBookStore\ShopDetailController;
use App\Http\Controllers\eBookStore\refundPolicyController;
use App\Http\Controllers\eBookStore\TermConditionController;
use App\Http\Controllers\eBookStore\TopbarController\FAQController;
use App\Http\Controllers\eBookStore\TopbarController\helpController;
use App\Http\Controllers\eBookStore\TopbarController\supportController;

use App\Http\Controllers\eBookStore\Backendpart\AdminDashboardController;
use App\Http\Controllers\eBookStore\Backendpart\CategoryController;
use App\Http\Controllers\eBookStore\Backendpart\BookController;
use App\Http\Controllers\eBookStore\Backendpart\UserController;
use App\Http\Controllers\eBookStore\Backendpart\ShoppingCartController;


Route::get('/', function () {
    return view('welcome');
});


    Route::get('/Home',[HomeController::class,'index'])->name('homepage');

// Route::group(['middleware'=>'Admin_verify'],function(){
    Route::get('/shopDetail',[ShopDetailController::class,'index'])->name('shopdetail');

    Route::get('/shoppingCart',[CartController::class,'index'])->name('shoppingcart');
    // for removing cart items from cart table
    Route::DELETE('/shoppingCart/{id}',[CartController::class,'destroy']);

    // for saving cart items to cart table & displaying cart modal
    Route::post('/addToCartDetailStore',[ShoppingCartController::class,'saveCartDetails']);
    // for counting the cart items
    Route::get('/getCartItemCount', [ShoppingCartController::class, 'getCartItemCount']);

    Route::get('/checkOut',[CheckOutController::class,'index'])->name('checkout');
    // for saving the orders details to order table
    Route::post('/checkOut/orderSubmitting',[CheckOutController::class,'store']);

    Route::get('/contact',[ContactController::class,'index'])->name('contact');

    Route::get('/logout',[RegisterController::class,'logout'])->name('logout');
// });

    // For RegistrationPages Routing
// Route::group(['middleware'=>'guest'],function(){

    Route::get('/login',[LogInController::class,'index'])->name('login')->middleware('Loggedin_verify');
    Route::post('/login',[LogInController::class,'store'])->name('login')->middleware('Loggedin_verify');

    Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('Loggedin_verify');
    Route::post('/register',[RegisterController::class,'store'])->name('register')->middleware('Loggedin_verify');
// });

// Admin Panel Routing
Route::get('/AdminDashboard',[AdminDashboardController::class,'index'])->middleware('Admin_verify');

    // Category part
    Route::get('/AdminDashboard/Category/Create',[CategoryController::class,'create'])->middleware('Admin_verify');
    Route::post('/AdminDashboard/Category/Store',[CategoryController::class,'store'])->middleware('Admin_verify');
    Route::get('/AdminDashboard/Book/Create',[BookController::class,'create'])->middleware('Admin_verify');
    Route::post('/AdminDashboard/Book/Store',[BookController::class,'store'])->middleware('Admin_verify');


// For Testing
Route::get('/UserDetails',[UserController::class,'getUserDetails']);


    // For FooterPages Routing

    Route::get('/refundPolicy',[refundPolicyController::class,'index']);

    Route::get('/aboutUs',[AboutUsController::class,'index']);

    Route::get('/privacyPolicy',[PrivacyController::class,'index']);

    Route::get('/termCondition',[TermConditionController::class,'index']);

    // For TopbarPages Routing

    Route::get('/FAQ',[FAQController::class,'index']);

    Route::get('/help',[helpController::class,'index']);

    Route::get('/support',[supportController::class,'index']);

    Route::fallback(function(){
        return "<h1> Page not found !!! </h1>";
    });
