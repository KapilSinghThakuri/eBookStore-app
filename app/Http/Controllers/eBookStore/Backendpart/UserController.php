<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserDetails()
    {
    // for the test only
        if (Auth::check()) {
            $user = Auth::user();
            // dd($user);
            $userName = $user->name;
            $userEmail = $user->email;
        }


    $orderBookIds = ShoppingCart::where('user_id', Auth::id())->pluck('book_id')->toArray();
    // $cartIds = DB::table('shopping_carts')->where('user_id', Auth::user()->id)->pluck('book_id');
    dd($orderBookIds);
    }
}



