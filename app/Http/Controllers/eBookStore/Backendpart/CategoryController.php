<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('eBookStore.adminPanel.category.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        Category::create([
            'name' => $validated['name'],
        ]);
        return back()->with('message','Category Added Successfully!!!');
    }
}
