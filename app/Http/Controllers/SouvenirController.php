<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenirs = Souvenir::where('public', 1)->get();

        return view('souvenirs.index', compact('souvenirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.souvenirs.create');
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

            'shop_items' => 'nullable|array|min:1',
            'shop_items.*.name' => 'required_with:shop_items|string|max:100',
            'shop_items.*.description' => 'required_with:shop_items|string|max:255',
            'shop_items.*.price' => 'required_with:shop_items|integer',

            'public' => 'boolean'
        ]);

        $validated['list_image'] = $request->file('list_image')->store('souvenirs', 'public');
        $validated['background_image'] = $request->file('background_image')->store('souvenirs', 'public');

        $slug = Str::slug($request->input('name'));
        $originalSlug = $slug;
        $counter = 1;
        while (Souvenir::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        if (!empty($validated['shop_items'])) {
            $shopItems = $validated['shop_items'];
            unset($validated['shop_items']);
        }

        $souvenir = Souvenir::create($validated);

        foreach ($shopItems ?? [] as $shopItem) {
            $souvenir->shopItems()->create($shopItem);
        }

        return redirect()->route('admin.souvenirs.index')
            ->with('alert', "De souvenirwinkel {$validated['name']} is aangemaakt!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
