<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index($id) {
        if (Auth::check()) {
            $userDetails = Auth::user()->id;
        }
        else{
            return redirect('/Home')->with('message','Please login first.');
        }
        $cartDetails = Book::where('id', $id)->get();
        // dd($userDetails,$cartDetails);
        return view('eBookStore.cart',compact('userDetails','cartDetails'));
    }

    // public function addToCart($id){
    //     if (Auth::check()) {
    //         $userDetails = Auth::user()->id;
    //     }
    //     else{
    //         return redirect('/Home')->with('message','Please login first.');
    //     }
    //     $cartDetails = Book::where('id', $id)->get();
    //     $user_cart_details = [
    //         'userDetails' => $userDetails,
    //         'cartDetails'=> $cartDetails->all(),
    //     ];
    //     return $user_cart_details;
    //     dd($user_cart_details);
    // }
}


