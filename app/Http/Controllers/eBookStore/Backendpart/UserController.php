<?php

namespace App\Http\Controllers\eBookStore\Backendpart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserDetails()
    {
        if (Auth::check()) {
            $usrId = Auth::id();

            $user = Auth::user();
            dd($user);
            $userName = $user->name;
            $userEmail = $user->email;
        }
    }
}
