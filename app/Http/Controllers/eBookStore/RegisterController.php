<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('eBookStore.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
    }
}
