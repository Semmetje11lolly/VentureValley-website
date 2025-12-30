<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function rides()
    {
        $rides = Ride::all();

        return view('admin.rides', compact('rides'));
    }
}
