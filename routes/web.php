<?php

use App\Http\Controllers\eBookStore\CartController;
use App\Http\Controllers\eBookStore\CheckOutController;
use App\Http\Controllers\eBookStore\ContactController;
use App\Http\Controllers\eBookStore\HomeController;
use App\Http\Controllers\eBookStore\LogInController;
use App\Http\Controllers\eBookStore\refundPolicyController;
use App\Http\Controllers\eBookStore\RegisterController;
use App\Http\Controllers\eBookStore\ShopDetailController;
use Illuminate\Support\Facades\Route;

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



    Route::get('/homePage',[HomeController::class,'index']);

    Route::get('/shopDetail',[ShopDetailController::class,'index']);

    Route::get('/shoppingCart',[CartController::class,'index']);

    Route::get('/checkOut',[CheckOutController::class,'index']);

    Route::get('/contact',[ContactController::class,'index']);

    Route::get('/login',[LogInController::class,'index']);

    Route::get('/register',[RegisterController::class,'index']);

    Route::get('/refundPolicy',[refundPolicyController::class,'index']);




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