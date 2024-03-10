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
            dd($user);
            $userName = $user->name;
            $userEmail = $user->email;
        }

    //retrieves all the books associated with the category with ID 15
        // $highlyRecomenededBook = Category::find(15)->books;
        // dd($highlyRecomenededBook->all());

    // method="POST" action="{{ url('/checkOut/orderSubmitting')}}"
    // $cartItems = ShoppingCart::where('user_id', Auth::user()->id)->pluck('book_id')->toArray();
    // dd($cartItems);

    // $cartIds = DB::table('shopping_carts')->select('id')->where('user_id', Auth::user()->id)->pluck('id');
    // dd($cartIds);

    $ShoppingCartItems = DB::table('shopping_carts')->join('books', 'shopping_carts.book_id', 'books.id')
                        ->select('books.*')->where('user_id', Auth::user()->id) ->get();
    $cartItems = ShoppingCart::where('user_id', Auth::user()->id)->get();
    // dd($ShoppingCartItems,$cartItems);

    }
}



