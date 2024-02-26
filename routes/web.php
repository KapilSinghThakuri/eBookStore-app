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

Route::get('/', function () {
    return view('welcome');
});

//  eBookStore Routing 

    Route::get('/Home',[HomeController::class,'index']);

    Route::get('/shopDetail',[ShopDetailController::class,'index']);

    Route::get('/shoppingCart',[CartController::class,'index']);

    Route::get('/checkOut',[CheckOutController::class,'index']);

    Route::get('/contact',[ContactController::class,'index']);

    // For RegistrationPages Routing

    Route::get('/login',[LogInController::class,'index'])->name('login');

    Route::get('/register',[RegisterController::class,'index'])->name('register');
    // Route::get('/register',[RegisterController::class,'store'])->name('register');


    // For FooterPages Routing

    Route::get('/refundPolicy',[refundPolicyController::class,'index']);

    Route::get('/aboutUs',[AboutUsController::class,'index']);

    Route::get('/privacyPolicy',[PrivacyController::class,'index']);

    Route::get('/termCondition',[TermConditionController::class,'index']);

    // For TopbarPages Routing

    Route::get('/FAQ',[FAQController::class,'index']);

    Route::get('/help',[helpController::class,'index']);

    Route::get('/support',[supportController::class,'index']);




// USING Prefix Routing with Controllers

// Route::prefix('eBookStore')->group( function(){
    
//     Route::controller(App\Http\Controllers\eBookStore\HomeController::class)->group(function (){
//         Route::get('/homePage','index');
//     });

//     Route::controller(App\Http\Controllers\eBookStore\ShopDetailController::class)->group(function (){
//         Route::get('/shopDetail','index');
//     });

//     Route::controller(App\Http\Controllers\eBookStore\CartController::class)->group(function (){
//         Route::get('/shoppingCart','index');
//     });

//     Route::controller(App\Http\Controllers\eBookStore\CheckOutController::class)->group(function (){
//         Route::get('/checkOut','index');
//     });

//     Route::controller(App\Http\Controllers\eBookStore\ContactController::class)->group(function (){
//         Route::get('/contact','index');
//     });

//     Route::controller(App\Http\Controllers\eBookStore\LogInController::class)->group(function (){
//         Route::get('/login','index');
//     });
// });