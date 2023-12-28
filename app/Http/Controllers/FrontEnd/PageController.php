<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $s = @$request->s;
        return view('fe.home' , compact('s'));
    }
    public function contact(Request $request)
    {
        $s = @$request->s;
        return view('fe.contact' , compact('s'));
    }
}
