<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\ShoppingCart;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::get();
        return view(
            'eBookStore.index',
            compact('categories', 'books')
        );
        // $religionSpirituality = Category::orderBy('id')->take(4)->get();
        // $businessEssential = Category::orderBy('id')->skip(4)->take(4)->get();
        // $remainCategories = Category::orderBy('id')->skip(8)->take(6)->get();
        // $userInfo = "";
        // if (Auth::user()) {
        //     $userInfo = User::where('id', Auth::user()->id)->get('email');
        // }
        // $highlyRecommendedBooks = $this->getHighlyRecomenededBooks();
        // // dd($highlyRecommendedBooks->all());
        // $top10ComingSoonBooks = $this->getTop10ComingSoonBooks();
        // $mysteryThrillerBooks = $this->getMysteryThrillerBooks();
        // $childrenBooks = $this->getChildrenBooks();
        // $buddhismBooks = $this->getBuddhismBooks();
        // $hinduismBooks = $this->getHinduismBooks();
        // $islamBooks = $this->getIslamBooks();
        // $christianityBooks = $this->getChristianityBooks();
        // $historyBiographyBooks = $this->getHistoryBiographyBooks();
        // $fictionFantasyBooks = $this->getFictionFantasyBooks();
        // $cartItemCount = ShoppingCart::where('user_id', Auth::user()->id)->count();

        return view(
            'eBookStore.index',
            // compact(
            //     'userInfo',
            //     'religionSpirituality',
            //     'businessEssential',
            //     'remainCategories',
            //     'highlyRecommendedBooks',
            //     'top10ComingSoonBooks',
            //     'mysteryThrillerBooks',
            //     'childrenBooks',
            //     'buddhismBooks',
            //     'hinduismBooks',
            //     'islamBooks',
            //     'christianityBooks',
            //     'historyBiographyBooks',
            //     'fictionFantasyBooks'
            // )
        );
    }
    private function gethighlyRecomenededBooks()
    {
        return Category::find(15)->books;
    }
    private function getTop10ComingSoonBooks()
    {
        return Category::find(16)->books;
    }
    private function getMysteryThrillerBooks()
    {
        return Category::find(9)->books;
    }
    private function getChildrenBooks()
    {
        return Category::find(12)->books;
    }
    private function getBuddhismBooks()
    {
        return Category::find(1)->books;
    }
    private function getHinduismBooks()
    {
        return Category::find(2)->books;
    }
    private function getIslamBooks()
    {
        return Category::find(3)->books;
    }
    private function getChristianityBooks()
    {
        return Category::find(4)->books;
    }
    private function getHistoryBiographyBooks()
    {
        return Category::find(11)->books;
    }
    private function getFictionFantasyBooks()
    {
        return Category::find(10)->books;
    }

    // Search and fetching the data using Linear Search Algorithm
    public function search(Request $request)
    {
        $output = "";
        $searchBook = $request->searchBook;

        $allBooks = Book::all();

        $matchingBooks = [];

        foreach ($allBooks as $book) {
            if (stripos($book->title, $searchBook) !== false) {
                $matchingBooks[] = $book;
            }
        }

        if (!empty($matchingBooks)) {
            foreach ($matchingBooks as $product) {
                $output .=
                    '<div class="border-bottom mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="' . $product->image . '" alt="Book Image" class="img-fluid"
                                style="width: 60px; height: auto;">
                            </div>
                            <div class="col-md-6">
                                <h5><a href="#">' . $product->title . '</a></h5>
                                <p>' . 'Rs.' . $product->price . '</p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" data-id="' . $product->id . '" class="addToCartBtn btn btn-sm text-dark p-0" style="text-decoration: none;">
                                <i class="fas fa-shopping-cart text-primary mr-1 mt-2"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>';
            }
            return response($output);
        } else {
            $output .=
                '<div class="border-bottom mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Your searched products are not available.</p>
                        </div>
                    </div>
                </div>';
            return response($output);
        }
    }
}
