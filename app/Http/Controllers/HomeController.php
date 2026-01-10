<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function privacy()
    {
        return view('privacy');
    }
}
