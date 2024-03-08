<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\Book;

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

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'street1' => 'required|string',
            'payment' => 'required',
            'total_amount' => 'required|numeric',
        ],
        [
            'province.required' => 'Please provide province for delivery convenience.',
            'payment.required' => 'Please select payment method !!!',
            'street1.required' => 'Please provide street location for delivery convenience.',
        ]);
        if ($validateData->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validateData->messages(),
            ]);
        }
        else
        {
            $orders = Order::create([
            'user_id' => Auth::User()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'street' => $request->input('street1'),
            'total_amount' => $request->input('total_amount'),
            'payment' => $request->input('payment'),
        ]);

        // Get shopping cart items for the authenticated user
        $cartItems = ShoppingCart::where('user_id', Auth::user()->id)->get();
        // Decrease book quantity and delete cart items
        foreach($cartItems as $item){
            $book = Book::find($item -> book_id);
            // Decrease book quantity by 1
            if ($book -> quantity > 0) {
                $book ->decrement('quantity');
            // Check if the book quantity is now zero, then delete the book
                if ($book -> quantity == 0) {
                    $book->delete();
                }
            }
        }

        // getting shopping cart id
        $cartIds = DB::table('shopping_carts')->select('id')->where('user_id', Auth::user()->id)->pluck('id');
        $orders->shoppingcarts()->sync($cartIds);

     // Delete cart items after order is placed
            // ShoppingCart::where('user_id',Auth::user()->id)->delete();
            // DB::table('shopping_carts')->where('user_id', Auth::user()->id)->delete();

            return response()->json([
                'status' => 200,
                'success' => 'Your Order Placed Successfully !!!',
            ]);
        }
    }
}
