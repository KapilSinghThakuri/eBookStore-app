<?php

namespace App\Http\Controllers\eBookStore;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class ShopDetailController extends Controller
{
    public function index() {
        $highlyRecomenededBooks = $this->gethighlyRecomenededBooks();
        $myOrderedBookDetails = $this->getOrderedBookDetails();
        return view('eBookStore.detail',compact('highlyRecomenededBooks','myOrderedBookDetails'));
    }
    private function gethighlyRecomenededBooks(){
        return Category::find(15)->books;
    }
    private function getOrderedBookDetails(){
        $ordersBooksDetails = DB::table('books_order')
            ->join('books', 'books_order.book_id', '=', 'books.id')
            ->join('orders', 'books_order.order_id', '=', 'orders.id')
            ->where('orders.user_id', Auth::id())
            ->select('books.*')
            ->get();
        return $ordersBooksDetails;
    }
}
