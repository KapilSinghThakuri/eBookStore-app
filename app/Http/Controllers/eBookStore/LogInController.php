<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $email = $request->email;
        $user = User::where('email', $email )->first();
        $roles = $user->role_id;
        $validated = $request->validated();
        if(Auth::attempt($request ->only('email','password'))){
            if($roles == 1){
            return redirect('/AdminDashboard');
            }
            else{
                return redirect('/Home');
            }
        }
        else{
            return back()->with('fail','Credentials does not match !!!');
        }
    }
}
