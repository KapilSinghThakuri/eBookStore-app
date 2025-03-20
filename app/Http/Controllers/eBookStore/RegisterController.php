<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('eBookStore.register');
    }

    public function store(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 1
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/AdminDashboard');
        } else {
            return back()->with('fail', 'Error occurred !!!');
        }
    }

    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect('/Home');
    }
}
