<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Ride;
use App\Models\Show;
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

        return view('admin.rides.index', compact('rides'));
    }

    public function shows()
    {
        $shows = Show::all();

        return view('admin.shows.index', compact('shows'));
    }

    public function restaurants()
    {
        $restaurants = Restaurant::all();

        return view('admin.restaurants.index', compact('restaurants'));
    }
}
