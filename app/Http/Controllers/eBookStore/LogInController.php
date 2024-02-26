<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogInController extends Controller
{
    public function index() {
        return view('eBookStore.signin');
    }

    public function store(UserLoginRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        if(Auth::attempt($request ->only('email','password'))){
            return redirect('/Home');
        }
        else{
            return back()->with('error','Error occurred !!!');
        }
    }
}
