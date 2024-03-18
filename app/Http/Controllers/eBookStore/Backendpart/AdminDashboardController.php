<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrderCount = $this->totalOrders();
        $totalBookCount = $this->totalBooks();
        $totalCategoryCount = $this->totalCategory();
        $categories = Category::all();
        return view('eBookStore.adminPanel.dashboard',
            compact('categories','totalOrderCount','totalBookCount','totalCategoryCount'));
    }
    private function totalOrders(){
        $orderCount = Order::all()->count();
        return $orderCount;
    }
    private function totalBooks(){
        $bookCount = Book::all()->count();
        return $bookCount;
    }
    private function totalCategory(){
        $categoryCount = Category::all()->count();
        return $categoryCount;
    }
}
