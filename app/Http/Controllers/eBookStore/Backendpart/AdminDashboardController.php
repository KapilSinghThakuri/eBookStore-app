<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $userName = $user->name;
        // }
        $categories = Category::all();
        return view('eBookStore.adminPanel.dashboard',compact('categories'));
    }
    // public function getUserDetails()
    // {
    //     $userName = null;
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         $userName = $user->name;
    //     }
    //     return view('eBookStore.adminPanel.dashboard',compact('userName'));
    // }
}
