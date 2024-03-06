<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\ShoppingCart;

class CheckOutController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $userDetails = Auth::User();
            $userId = $userDetails->id;
            $cartDetails = DB::table('shopping_carts')
            ->join('books', 'shopping_carts.book_id','books.id')
            ->select('books.*','shopping_carts.id as cartItemId')
            ->where('shopping_carts.user_id',$userId)->get();
            return view('eBookStore.checkout',compact('userDetails','cartDetails'));
        }
        else
        {
            return redirect('/login')->with('message','Please login first.');
        }
    }
}
