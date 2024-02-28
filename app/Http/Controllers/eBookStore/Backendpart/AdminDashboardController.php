<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('eBookStore.adminPanel.dashboard',compact('categories'));
    }
}
