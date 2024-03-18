<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $totalOrders = $this->getOrderDetails();
        return view('eBookStore.adminPanel.order.index',compact('totalOrders'));
    }
    private function getOrderDetails(){
        $orders = Order::simplePaginate(10);
        return $orders;
    }
}
