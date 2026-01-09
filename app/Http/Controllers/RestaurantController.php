<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::where('public', 1)->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'subtitle' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',

            'list_image' => 'required|image|mimes:webp|dimensions:width=600,height=800',
            'background_image' => 'required|image|mimes:webp',

            'menu_items' => 'nullable|array|min:1',
            'menu_items.*.name' => 'required_with:menu_items|string|max:100',
            'menu_items.*.description' => 'required_with:menu_items|string|max:255',
            'menu_items.*.price' => 'required_with:menu_items|integer',

            'public' => 'boolean'
        ]);

        $validated['list_image'] = $request->file('list_image')->store('restaurants', 'public');
        $validated['background_image'] = $request->file('background_image')->store('restaurants', 'public');

        $slug = Str::slug($request->input('name'));
        $originalSlug = $slug;
        $counter = 1;
        while (Restaurant::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        $menuItems = $validated['menu_items'];
        unset($validated['menu_items']);

        $restaurant = Restaurant::create($validated);

        foreach ($menuItems as $menuItem) {
            $restaurant->menuItems()->create($menuItem);
        }

        return redirect()->route('admin.restaurants.index')
            ->with('alert', "Het restaurant {$validated['name']} is aangemaakt!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        if (!$restaurant->public && Gate::denies('admin')) abort(404);

        $restaurants = Restaurant::where('id', '!=', $restaurant->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $restaurant->load('menuItems');

        return view('restaurants.show', compact('restaurant', 'restaurants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
