<?php

namespace App\Http\Controllers\eBookStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class refundPolicyController extends Controller
{
    public function index(){
        return view('eBookStore.footerPages.refunds');
    }
}
