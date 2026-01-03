<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rides = Ride::where('public', 1)->get();

        return view('rides.index', compact('rides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rides.create');
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

            'stat_speed' => 'nullable|integer',
            'stat_length' => 'nullable|integer',
            'stat_height' => 'nullable|integer',
            'stat_duration' => 'nullable|integer',
            'stat_capacity' => 'nullable|integer',

            'property_controllable' => 'boolean',
            'property_audio' => 'boolean',
            'property_smoothcoasters' => 'boolean',
            'public' => 'boolean'
        ]);

        $validated['list_image'] = $request->file('list_image')->store('rides', 'public');
        $validated['background_image'] = $request->file('background_image')->store('rides', 'public');

        $slug = Str::slug($request->input('name'));
        $originalSlug = $slug;
        $counter = 1;
        while (Ride::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        Ride::create($validated);

        return redirect()->route('admin.attracties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
        if (!$ride->public && Gate::denies('admin')) abort(404);

        $rides = Ride::where('id', '!=', $ride->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('rides.show', compact('ride', 'rides'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ride $ride)
    {
        return view('admin.rides.edit', compact('ride'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'subtitle' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',

            'list_image' => 'nullable|image|mimes:webp|dimensions:width=600,height=800',
            'background_image' => 'nullable|image|mimes:webp',

            'stat_speed' => 'nullable|integer',
            'stat_length' => 'nullable|integer',
            'stat_height' => 'nullable|integer',
            'stat_duration' => 'nullable|integer',
            'stat_capacity' => 'nullable|integer',

            'property_controllable' => 'boolean',
            'property_audio' => 'boolean',
            'property_smoothcoasters' => 'boolean',
            'public' => 'boolean'
        ]);

        if ($request->hasFile('list_image')) {
            $validated['list_image'] = $request->file('list_image')->store('rides', 'public');
        }
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('rides', 'public');
        }

        $ride->update($validated);

        return redirect()->route('admin.attracties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        $ride->delete();

        return redirect()->route('admin.attracties');
    }
}
