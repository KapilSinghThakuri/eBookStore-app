<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
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


    // $ordersPersonDetails = Order::where('user_id', Auth::id())->get();
    // $orderId = Order::where('user_id', Auth::id())->get('id');
    // $orderId = DB::table('orders')->select('id')->where('user_id', Auth::id())->first();
    // dd($orderId);
    // $ordersBooksDetails = Db::table('books_order')
    //     ->join('books', 'books_order.book_id', 'books.id')
    //     ->where(DB::table('orders')->select('id')->where('user_id', Auth::id())->first(), '=', 'books_order.order_id')
    //     ->select('books.*')
    //     ->get();

    // $ordersBooksDetails = DB::table('books_order')
    //         ->join('books', 'books_order.book_id', '=', 'books.id')
    //         ->join('orders', 'books_order.order_id', '=', 'orders.id')
    //         ->where('orders.user_id', Auth::id())
    //         ->select('books.*')
    //         ->get();
        // $totalCountOrders = Order::count();
    // $orderCount = Order::all()->count();

        $category = Category::find(22);
        dd($category);
    }
}



