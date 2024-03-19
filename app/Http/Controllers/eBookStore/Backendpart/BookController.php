<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    public function index()
    {
        $totalBooks = Book::paginate(10);
        return view('eBookStore.adminPanel.book.index',compact('totalBooks'));
    }
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
    public function remove($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            'status' => 200,
            'message' => "Book Deleted Successfully !!!",
        ]);
    }
    public function edit($id)
    {
        $bookDetails = Book::find($id);
        return view('eBookStore.adminPanel.book.edit',compact('bookDetails'));
    }
    // public function update($id)
    // {
    //     $validator = validator::make($request->all(),[
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'author'=> 'required|string',
    //         'price'=> 'required',
    //         'quantity' => 'required',
    //         'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
    //         'rating' => 'required|integer',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json([
    //             'status'=> 400,
    //             'error'=> $validator->messages(),
    //         ]);
    //     }
    //     else{
    //         if($request->has('image')){
    //             $file = $request->file('image');
    //             $fileName = time().'.'.$file->getClientOriginalExtension();
    //             $file->move(public_path('/eBookStore/img'), $fileName);
    //         }else{
    //             return back()->with('message','Please upload image first');
    //         }
    //         $book = Book::update([
    //         'title' => $request->input('title'),
    //         'description' => $request->input('description'),
    //         'author'=> $request->input('author'),
    //         'price'=> $request->input('price'),
    //         'quantity' => $request->input('quantity'),
    //         'image' => '/eBookStore/img/' . $fileName,
    //         'rating' => $request->input('rating'),
    //         ]);

    //         return response()->json([
    //             'status'=> 200,
    //             'success' => "Book Added Successfully !!!",
    //         ]);
    //     }
    // }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:3072',
            'rating' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        } else {
            $book = Book::find($id);

            if (!$book) {
                return response()->json([
                    'status' => 404,
                    'error' => 'Book not found.',
                ]);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/eBookStore/img'), $fileName);
                $book->image = '/eBookStore/img/' . $fileName;
            }

            $book->title = $request->input('title');
            $book->description = $request->input('description');
            $book->author = $request->input('author');
            $book->price = $request->input('price');
            $book->quantity = $request->input('quantity');
            $book->rating = $request->input('rating');
            $book->save();

            return response()->json([
                'status' => 200,
                'success' => "Book updated successfully.",
            ]);
        }
    }

}
