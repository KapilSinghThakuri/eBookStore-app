<?php

namespace App\Http\Controllers\eBookStore\TopbarController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class supportController extends Controller
{
    public function index(){
        return view('eBookStore.topbarPages.support');
    }
}
