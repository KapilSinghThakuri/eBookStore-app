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
use App\Http\Controllers\eBookStore\Backendpart\OrderController;
use App\Http\Controllers\eBookStore\Backendpart\SalesController;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/Home',[HomeController::class,'index'])->name('homepage')->middleware('Loggedin_verify');
    Route::get('/searchProducts',[HomeController::class,'search'])->name('search');

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

// For Signup-Signin Routing
Route::middleware('alreadyLoggedIn_verify')->group(function(){
    Route::get('/login',[LogInController::class,'index'])->name('login');
    Route::post('/login',[LogInController::class,'store'])->name('login');

    Route::get('/register',[RegisterController::class,'index'])->name('register');
    Route::post('/register',[RegisterController::class,'store'])->name('register');
});

// Admin Panel Routing
Route::middleware('Admin_verify')->group(function(){
    Route::get('/AdminDashboard',[AdminDashboardController::class,'index'])->name('admindashboard');
    Route::get('/AdminDashboard/Category/index',[CategoryController::class,'index'])->name('categoryDetail');
    Route::get('/AdminDashboard/Category/Create',[CategoryController::class,'create']);
    Route::post('/AdminDashboard/Category/Store',[CategoryController::class,'store']);
    Route::delete('/AdminDashboard/Category/{id}/Destroy',[CategoryController::class,'remove']);
    Route::get('/AdminDashboard/Category/{id}/Edit',[CategoryController::class,'edit']);
    Route::put('/AdminDashboard/Category/{id}/Update',[CategoryController::class,'update']);

    Route::get('/AdminDashboard/Book/index',[BookController::class,'index'])->name('bookDetail');
    Route::get('/AdminDashboard/Book/Create',[BookController::class,'create']);
    Route::post('/AdminDashboard/Book/Store',[BookController::class,'store']);
    Route::delete('/AdminDashboard/Book/{id}/Destroy',[BookController::class,'remove']);
    Route::get('/AdminDashboard/Book/{id}/Edit',[BookController::class,'edit']);
    Route::put('/AdminDashboard/Book/{id}/Update',[BookController::class,'update']);

    Route::get('/AdminDashboard/Sales/index',[SalesController::class,'index'])->name('sales');

    Route::delete('/User/{id}/Delete',[AdminDashboardController::class,'destroy']);
    Route::get('/AdminDashboard/Order/index',[OrderController::class,'index'])->name('orderDetail');
});


// For Testing...
    // Route::get('/UserDetails',[UserController::class,'getUserDetails']);


// For FooterPages Routing
    Route::get('/refundPolicy',[refundPolicyController::class,'index']);
    Route::get('/aboutUs',[AboutUsController::class,'index']);
    Route::get('/privacyPolicy',[PrivacyController::class,'index']);
    Route::get('/termCondition',[TermConditionController::class,'index']);

// For TopbarPages Routing
    Route::get('/FAQ',[FAQController::class,'index']);
    Route::get('/help',[helpController::class,'index']);
    Route::get('/support',[supportController::class,'index']);
// For not found error
    Route::fallback(function(){
        return "<h1> Page not found !!! </h1>";
    });
