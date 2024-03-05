<?php

namespace App\Http\Controllers\eBookStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\ShoppingCart;

class CartController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $userDetails = Auth::user()->id;
        }
        else{
            return redirect('/Home')->with('message','Please login first.');
        }

        // $cartDetails = ShoppingCart::where('user_id', $userDetails)->pluck('book_id');
        $cartDetails = DB::table('shopping_carts')
            ->join('books', 'shopping_carts.book_id','books.id')
            ->select('books.*','shopping_carts.id as cartItemId')
            ->where('shopping_carts.user_id',$userDetails)->get();
        // dd($userDetails,$cartDetails);

        return view('eBookStore.cart',compact('userDetails','cartDetails'));
    }

// Removing the cart items
    public function destroy($id){
        $cartItem = ShoppingCart::find($id);
        // dd($cartItem);
        $cartItem->delete();
        return response()->json([
            'status'=> 200,
            'success'=> 'Your cart item is removed.',
        ]);
    }
}


