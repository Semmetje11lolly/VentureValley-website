<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function bezoeken()
    {
        return view('bezoeken');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function parkreglement()
    {
        return view('parkreglement');
    }

    public function openingstijden()
    {
        return view('openingstijden');
    }
}
