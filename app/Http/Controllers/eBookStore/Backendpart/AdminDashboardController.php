<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrderCount = $this->totalOrders();
        $totalBookCount = $this->totalBooks();
        $totalCategoryCount = $this->totalCategory();
        $totalUsers = $this->totalUsers();
        $weeklySales = $this->getWeeklySales();
        $categories = Category::all();
        return view('eBookStore.adminPanel.dashboard',
            compact('categories','totalOrderCount','totalBookCount','totalCategoryCount','totalUsers'
                    ,'weeklySales'));
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
    private function totalUsers(){
        $users = User::all()->where('role_id', '==', 2);
        return $users;
    }
    private function getWeeklySales()
    {
        $startDate = now()->startOfWeek()->format('Y-m-d');
        $endDate = now()->endOfWeek()->format('Y-m-d');

        // Fetch weekly sales from the orders table
        $weeklySales = Order::whereBetween(DB::raw('DATE(order_date)'), [$startDate, $endDate])
                        ->sum('total_amount');

        return $weeklySales;
    }

    public function createUser()
    {
        return view('eBookStore.adminPanel.user.add-user');
    }
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        return redirect()->route('admindashboard')->with('success_message','New user addded successfully!!!');
    }
    public function destroy(String $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with('message','User not found !!!');
        }

        $userOrders = Order::where('user_id', $id)->get();
        foreach ($userOrders as $order) {
            $order->delete();
        }

        $user->delete();
        return back()->with('message','User with all associated history deleted successfully !!!');
    }
}
