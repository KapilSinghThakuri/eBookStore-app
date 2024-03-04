<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class ShopDetailController extends Controller
{
    public function index() {
        $highlyRecomenededBooks = $this->gethighlyRecomenededBooks();
        return view('eBookStore.detail',compact('highlyRecomenededBooks'));
    }
    private function gethighlyRecomenededBooks(){
        return Category::find(15)->books;
    }
}
