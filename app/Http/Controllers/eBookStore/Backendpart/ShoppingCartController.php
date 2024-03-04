<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function saveCartDetails(Request $request)
    {
        if (Auth::check()) {
        $userId = Auth::id();
        // Retrieve book ID from request
        $bookId = $request->input('book_id');
        $book = Book::find($bookId);
        if ($book) {
            $cartItem = new ShoppingCart();
            $cartItem->user_id = $userId;
            $cartItem->book_id = $bookId;
            $cartItem->save();

            // Return success response with book details
            return response()->json([
                'status' => 200,
                'book' => [
                    'title' => $book->title,
                    'price' => $book->price,
                    'image' => $book->image,
                ],
                'success' => 'Item added to your cart !!!',
            ]);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Please select book first !!!',
                ]);
            }
        }
        else {
        return response()->json([
            'status' => 401,
            'message' => 'Please login first !!!']);
        }
    }
}
