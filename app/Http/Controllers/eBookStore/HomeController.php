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

        $highlyRecommendedBooks = $this->getHighlyRecomenededBooks();
        // dd($highlyRecommendedBooks->all());
        $top10ComingSoonBooks = $this->getTop10ComingSoonBooks();

        return view('eBookStore.index',
            compact('religionSpirituality','businessEssential','remainCategories','highlyRecommendedBooks','top10ComingSoonBooks'));
    }
    private function gethighlyRecomenededBooks()
    {
    //retrieves all the books associated with the category with ID 15
        return Category::find(15)->books;
    }
    private function getTop10ComingSoonBooks(){
        return Category::find(16)->books;
    }
}
