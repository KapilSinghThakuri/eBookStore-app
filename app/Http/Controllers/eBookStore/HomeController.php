<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;


class HomeController extends Controller
{
    public function index() {
        $religionSpirituality = Category::orderBy('id')->take(4)->get();
        $businessEssential = Category::orderBy('id')->skip(4)->take(4)->get();
        $remainCategories = Category::orderBy('id')->skip(8)->take(6)->get();
// dd($remainCategories->all());
        $books = Book::where('id',2)->get();
        return view('eBookStore.index',
            compact('books','religionSpirituality','businessEssential','remainCategories'));
    }
}
