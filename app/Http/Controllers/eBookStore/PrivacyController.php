<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){
        return view('eBookStore.footerPages.privacyPolicy');
    }
}
