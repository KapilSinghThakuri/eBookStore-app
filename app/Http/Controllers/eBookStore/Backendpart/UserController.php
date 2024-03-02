<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserDetails()
    {
    // for the test only
        // if (Auth::check()) {
        //     $usrId = Auth::id();

        //     $user = Auth::user();
        //     dd($user);
        //     $userName = $user->name;
        //     $userEmail = $user->email;
        // }

    //retrieves all the books associated with the category with ID 15
        $highlyRecomenededBook = Category::find(15)->books;
        dd($highlyRecomenededBook->all());
    }
}
