<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        return view('eBookStore.cart');
    }
    public function addToCart($id){
        $userDetails = Auth::user()->id;
        $cartDetails = Book::where('id', $id)->get();
        dd($cartDetails->all(),$userDetails);
    }
}
