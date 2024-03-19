<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $totalCategories = Category::simplePaginate(6);
        return view('eBookStore.adminPanel.category.index',compact('totalCategories'));
    }
    public function create()
    {
        return view('eBookStore.adminPanel.category.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
        // Validation passed, create a new category using the validated data
        Category::create([
            'name' => $request->input('name'),
        ]);

        // Return a JSON response indicating success
        return response()->json([
            'status' => 200,
            'message' => 'Category Added Successfully!!!',
        ]);
        }
    }
    public function remove($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => 200,
            'message' => "Category Deleted Successfully !!!",
        ]);
    }
}
