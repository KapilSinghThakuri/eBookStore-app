<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    public function create()
    {
        return view('eBookStore.adminPanel.book.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author'=> 'required|string',
            'price'=> 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
            'rating' => 'required|integer',
            'category_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'error'=> $validator->messages(),
            ]);
        }
        else{
            if($request->has('image')){
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('/eBookStore/img'), $fileName);
            }else{
                return back()->with('message','Please upload image first');
            }
            $book = Book::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author'=> $request->input('author'),
            'price'=> $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => '/eBookStore/img/' . $fileName,
            'rating' => $request->input('rating'),
            ]);

            $categoryIds = $request->input('category_id');
            $book->categories()->sync($categoryIds);

            return response()->json([
                'status'=> 200,
                'success' => "Book Added Successfully !!!",
            ]);
        }
    }
}
